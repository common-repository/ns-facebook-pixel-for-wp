var executeWhenReachedPagePercentage = function(percentage, callback) {
  if (typeof percentage !== 'number') {
    console.error(
      'First parameter must be a number, got',
      typeof percentage,
      'instead',
    );
  }

  if (typeof callback !== 'function') {
    console.error(
      'Second parameter must be a function, got',
      typeof callback,
      'instead',
    );
  }

  function getDocumentLength() {
    var D = document;
    return Math.max(
        D.body.scrollHeight, D.documentElement.scrollHeight,
        D.body.offsetHeight, D.documentElement.offsetHeight,
        D.body.clientHeight, D.documentElement.clientHeight
    )
  }

  function getWindowLength() {
    return window.innerHeight || 
      (document.documentElement || document.body).clientHeight;
  }

  function getScrollableLength() {
    if (getDocumentLength() > getWindowLength()) {
      return getDocumentLength() - getWindowLength();
    } else {
      return 0;
    }
  }

  var scrollableLength = getScrollableLength();

  window.addEventListener("resize", function(){
    scrollableLength = getScrollableLength();
  }, false)

  function getCurrentScrolledLengthPosition() {
   return window.pageYOffset || 
     (document.documentElement || document.body.parentNode || document.body).scrollTop;
  }

  function getPercentageScrolled() {
    if (scrollableLength == 0) {
      return 100;
    } else {
      return getCurrentScrolledLengthPosition() / scrollableLength * 100;
    }
  }

  var executeCallback = (function() {
    var wasExecuted = false;
    return function() {
      if (!wasExecuted && getPercentageScrolled() > percentage) {
        wasExecuted = true;
        callback();
      }
    };
  })();

  if (getDocumentLength() == 0 ||
    (getWindowLength()/getDocumentLength() * 100 >= percentage)) {
    callback();
  } else {
    window.addEventListener('scroll', executeCallback, false);
  }
};


if(document.getElementById('ns-fbp4wp-scroll-percentage-option-setting') !== null && document.getElementById('ns-fbp4wp-is-log-permitted-option-setting') !== null){
	var perc = document.getElementById('ns-fbp4wp-scroll-percentage-option-setting').value;
	var isLogPermitted = document.getElementById('ns-fbp4wp-is-log-permitted-option-setting').value;
	
	if(isLogPermitted == '1') {
		executeWhenReachedPagePercentage(parseInt(perc), function() {
		  fbq('track', 'Lead');
		});
	}
}


