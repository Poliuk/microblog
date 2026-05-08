(function () {
	var ADMIN_H = 46;
	function isMobile() { return window.innerWidth <= 782; }
	var topbar;
	function update() {
		if (!topbar) topbar = document.querySelector('.header-topbar');
		if (!topbar) return;
		if (!isMobile()) { topbar.style.top = ''; return; }
		var scrollY = window.scrollY || window.pageYOffset || 0;
		topbar.style.top = Math.max(0, ADMIN_H - scrollY) + 'px';
	}
	function loop() { update(); requestAnimationFrame(loop); }
	document.addEventListener('DOMContentLoaded', loop);
})();
