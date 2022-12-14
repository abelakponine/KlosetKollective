
/* jQuery idleTimer plugin
version 0.9.100511 */

( function($){
$.idleTimer = function(newTimeout, elem, opts){

opts = $.extend({
startImmediately : true, //starts a timeout as soon as the timer is set up
idle: false , //indicates if the user is idle
enabled : true, //indicates if the idle timer is enabled
timeout : 30000 , //the amount of time (ms) before the user is considered idle
events : 'mousemove keydown keyup load click onresize DOMMouseScroll mousewheel mousedown touchstart touchmove' // activity is one of these events
}, opts);

elem = elem || document;

var toggleIdleState = function(myelem){

if ( typeof myelem === 'number' ){
myelem = undefined ;
}
var obj = $.data(myelem || elem, 'idleTimerObj' );

obj.idle = ! obj.idle;
var elapsed = ( + new Date()) - obj.olddate;
obj.olddate = + new Date();

if (obj.idle && (elapsed < opts.timeout)) {
obj.idle = false ;
clearTimeout($.idleTimer.tId);
if (opts.enabled)
$.idleTimer.tId = setTimeout(toggleIdleState, opts.timeout);
return ;
}

var event = jQuery.Event( $.data(elem, 'idleTimer' , obj.idle ? "idle" : "active" ) + '.idleTimer' );

$(elem).trigger(event);
},

stop = function (elem){
var obj = $.data(elem, 'idleTimerObj' ) || {};
obj.enabled = false ;
clearTimeout(obj.tId);
$(elem).off( '.idleTimer' );
},

handleUserEvent = function(){
var obj = $.data( this, 'idleTimerObj' );

clearTimeout(obj.tId);

if (obj.enabled){

if (obj.idle){
toggleIdleState( this);
}

obj.tId = setTimeout(toggleIdleState, obj.timeout);
}
};

var obj = $.data(elem, 'idleTimerObj' ) || {};
obj.olddate = obj.olddate || + new Date();

if ( typeof newTimeout === "number" ){
opts.timeout = newTimeout;
} else if (newTimeout === 'destroy' ) {
stop(elem);
return this;
} else if (newTimeout === 'getElapsedTime' ){
return ( + new Date()) - obj.olddate;
}

$(elem).on($.trim((opts.events + ' ' ).split( ' ' ).join( '.idleTimer ' )),handleUserEvent);
obj.idle = opts.idle;
obj.enabled = opts.enabled;
obj.timeout = opts.timeout;

if (opts.startImmediately) {
obj.tId = setTimeout(toggleIdleState, obj.timeout);
}

$.data(elem, 'idleTimer' , "active" );

$.data(elem, 'idleTimerObj' ,obj);

}; // end of $.idleTimer()

$.fn.idleTimer = function (newTimeout,opts){

if ( ! opts) {
opts = {};
}
if ( this[ 0 ]){
$.idleTimer(newTimeout, this[ 0 ],opts);
}
return this;
};
})(jQuery);


