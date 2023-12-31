var _localDomain = 'backend/server/dashboard.php';
var _browsers = ['chrome'];

export const a = {
	browserSyncOpts: {
		browser: _browsers, // Browsers
		notify: false,
		startPath: '/',
		proxy: _localDomain, // Local domain
	}
}