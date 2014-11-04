<?php
// Current screen
global $current_screen;
// Pages Slugs
global $adpress_page_campaigns;
global $adpress_page_addcampaign;
global $adpress_page_adsrequests;
global $adpress_page_settings;
global $adpress_page_payments;
global $adpress_page_addons;
global $adpress_page_available;
global $adpress_page_purchases;
global $adpress_page_purchase;
global $adpress_page_ad;

// For Compatibility with older WordPress Versions
if (method_exists($current_screen, 'add_help_tab')) {
	switch ($current_screen->id) {
	case $adpress_page_campaigns:
		$current_screen->add_help_tab(array(
			'id' => 'adpress_campaigns_page_tab1',
			'title' => __('Campaigns', 'wp-adpress'),
			'content' => '<p>' . __('You can find here all the campaigns you have added.', 'wp-adpress') . '</p>' .
			'<li>' . __('<strong>More</strong> Displays additional information about the campaign.', 'wp-adpress') . '</li>' .
			'<li>' . __('<strong>Activate/Deactivate</strong> Enable or disable the campaign.', 'wp-adpress') . '</li>' .
			'<li>' . __('<strong>Edit</strong> Edit the campaign settings.', 'wp-adpress') . '</li>' .
			'<li>' . __('<strong>Remove</strong> Completely remove the campaign from the database.', 'wp-adpress') . '</li>',
			));
		$current_screen->add_help_tab(array(
			'id' => 'adpress_campaigns_page_tab2',
			'title' => __('Active Campaign', 'wp-adpress'),
			'content' => '<p>' . __('When a campaign is active, buyers can see it and purchase an ad. If you make a campaign inactive, its settings will be kept but it won\'t be accessible for buyers.', 'wp-adpress') . '</p>' .
			'<p>' . __('When a buyer purchase an Ad, the campaign can no longer be disabled, edited or removed. It turns to a locked state. To unlock the campaign, free all the ad spots it has.', 'wp-adpress') . '</p>',
			));
		break;
	case $adpress_page_addcampaign:
		$current_screen->add_help_tab(array(
			'id' => 'adpress_addcampaign_page_tab1',
			'title' => __('Campaign Details', 'wp-adpress'),
			'content' => '<h2>' . __('Campaign Details', 'wp-adpress') . '</h2>' .
			'<li>' . __('<strong>Campaign Name</strong> Enter a descriptive name (eg. SideBar Ad, BlogRoll...)', 'wp-adpress') . '</li>' .
			'<li>' . __('<strong>Campaign Description</strong> Put some details about the Campaign, Contract type, or Payment', 'wp-adpress') . '</li>' .
			'<li>' . __('<strong>State</strong> Set to active if you want this campaign to be visible to buyers', 'wp-adpress') . '</li>'
		));
		$current_screen->add_help_tab(array(
			'id' => 'adpress_addcampaign_page_tab2',
			'title' => __('Ad Desginer', 'wp-adpress'),
			'content' => '<p>' . __('The Ad Designer allows you to select an Ad type and customize how they\'ll display to the user', 'wp-adpress') . '</p>' .
			'<h2>' . __('Image Ad', 'wp-adpress') . '</h2>' .
			'<li>' . __('<strong>Image Size</strong> Enter the image size in pixels', 'wp-adpress') . '</li>' .
			'<li>' . __('<strong>Columns Number</strong> Enter how many columns you want to have. This will depend on your theme and also how you want to display the Ads', 'wp-adpress') . '</li>' .
			'<li>' . __('<strong>Ads Number</strong> The number of Ads to display (and also available to purchase)', 'wp-adpress') . '</li>' .
			'<h2>' . __('Link Ad', 'wp-adpress') . '</h2>' .
			'<li>' . __('<strong>Link Length</strong> The maximum number of characters the anchor can have', 'wp-adpress') . '</li>' .
			'<li>' . __('<strong>Ads Number</strong> The number of Ads to display (and also available to purchase)', 'wp-adpress') . '</li>' .
			'<h2>' . __('Ad Preview', 'wp-adpress') . '</h2>' .
			'<p>' . __('After settings the Ad settings, click the "Preview" button. This will display how your ads will look like. This is especially useful if you are using an Image Ad, and multiple columns.', 'wp-adpress') . '</p>'
		));
		$current_screen->add_help_tab(array(
			'id' => 'adpress_addcampaign_papge_tab3',
			'title' => __('Ad CTA', 'wp-adpress'),
			'content' => '<p>' . __('When you have available Ad Spots (not sold yet), you can fill one with a call to action. It\'s a typical Ad that redirects the user to a landing page where they find more information about your advertising on your website. By default, Ad CTA is disabled. Click the Ad CTA checkbox to enable it, and enter your Ad information.', 'wp-adpress') . '</p>' .
			'<h2>' . __('Image Ad', 'wp-adpress') . '</h2>' .
			'<p>' . __('Upload or select an image with the WordPress Media Uploder, and then specify your target URL. When the campaign is active, and there are available spots, the visitors will see this image. The image dimensions should match your campaign ad size.', 'wp-adpress') . '</p>' .
			'<h2>' . __('Link Ad', 'wp-adpress') . '</h2>' .
			'<p>' . __('The same thing for the link Ad, with the difference that you\'ll enter text instead of an image.', 'wp-adpress') . '</p>'
		)
	);
		$current_screen->add_help_tab(array(
			'id' => 'adpress_addcampaign_page_tab3',
			'title' => __('Contract Details', 'wp-adpress'),
			'content' => '<h2>' . __('Contract Type', 'wp-adpress') . '</h2>' .
			'<p>' . __('AdPress supports three contract types. You should specify the type of contract, and also the price.', 'wp-adpress') . '</p>' .
			'<li>' . __('<strong>Clicks</strong> The Ad will expire after the afore mentioned number of clicks', 'wp-adpress') . '</li>' .
			'<li>' . __('<strong>PageViews</strong> The Ad will expire after the afore mentioned number of views', 'wp-adpress') . '</li>' .
			'<li>' . __('<strong>Duration</strong> The Ad will expire after the afore mentioned number of days', 'wp-adpress') . '</li>' .
			'<h2>' . __('Price', 'wp-adpress') . '</h2>' .
			'<p>' . __('This is the full price that the purchase gets to pay.', 'wp-adpress') . '</p>'
		));
		break;
	case $adpress_page_adsrequests:
		$current_screen->add_help_tab(array(
			'id' => 'adpress_adsrequests_page_tab1',
			'title' => __('Ads Requests', 'wp-adpress'),
			'content' => '<p>' . __('The first part of the page displays the pending Ad Requests. When a buyer purchase an Ad, and you are not allowing automatic approval, the Ad must be approved from this Dashboard to get running. The panel displays the following information') . '</p>' .
			'<li>' . __('<strong>Id</strong> Each Ad has a unique number in the whole system.', 'wp-adpress') . '</li>' .
			'<li>' . __('<strong>Campaign</strong> The Campaign name the Ad belongs to', 'wp-adpress') . '</li>' .
			'<li>' . __('<strong>Client</strong> The user that purchased the Ad', 'wp-adpress') . '</li>' .
			'<li>' . __('<strong>Requested Ad</strong> The time the request was sent', 'wp-adpress') . '</li>' .
			'<h2>' . __('Actions', 'wp-adpress') . '</h2>' .
			'<li>' . __('<strong>Approve</strong> Approve the Ad', 'wp-adpress') . '</li>' .
			'<li>' . __('<strong>Reject</strong> Reject the Ad', 'wp-adpress') . '</li>' .
			'<li>' . __('<strong>More</strong> The Ad parameters that the user entered (URL, Image, Link, Message) and also the PayPal transaction infomation if PayPal is enabled.', 'wp-adpress') . '</li>'
		));
		$current_screen->add_help_tab(array(
			'id' => 'adpress_adsrequests_page_tab2',
			'title' => __('Running Ads', 'wp-adpress'),
			'content' => '<p>' . __('Displays the currently running Ads', 'wp-adpress') . '</p>' .
			'<li>' . __('<strong>Id</strong> Each Ad has a unique number in the whole system.', 'wp-adpress') . '</li>' .
			'<li>' . __('<strong>Campaign</strong> The Campaign name the Ad belongs to', 'wp-adpress') . '</li>' .
			'<li>' . __('<strong>Client</strong> The user that purchased the Ad', 'wp-adpress') . '</li>' .
			'<li>' . __('<strong>Expire</strong> The remaining clicks, views or days after which the campaign expire.', 'wp-adpress') .
			'<h2>' . __('Stats', 'wp-adpress') . '</h2>' .
			'<p>' . __('Displays the Ad statics', 'wp-adpress') . '</p>'
		));
		break;
	case $adpress_page_settings:
		if (!isset($_GET['tab'])) {
			$_GET['tab'] = 'general';
		}
		switch ($_GET['tab']) {
		case 'general':
			$current_screen->add_help_tab(array(
				'id' => 'general_help_tab1',
				'title' => __('General Settings', 'wp-adpress'),
				'content' => '<h2>' . __('General Settings', 'wp-adpress') . '</h2>' .
				'<li>' . __('<strong>Currency</strong> USD by default. If you are using PayPal to process the payments, make sure you use a currency supported by PayPal.', 'wp-adpress') . '</li>' .
				'<li>' . __('<strong>Time Format</strong> Refer the <a href="http://php.net/manual/en/function.date.php">PHP Manual</a> to know how the formatting works.', 'wp-adpress') . '</li>' .
				'<li>' . __('<strong>Admin Bar</strong> Displays a Menu in the WordPress Admin bar. It also notifies when you have new Ad requests.', 'wp-adpress') . '</li>' .
				'<li>' . __('<strong>Debugging Mode</strong> Enable Errors and variable logging. Enable this if you are tracking a bug or problem.', 'wp-adpress') . '</li>' .
				'<li>' . __('<strong>Smart Rewrite</strong> Enable Smart permalinks format http://site.com/adpress/xx for Ad links.', 'wp-adpress') . '</li>'
			));
			$current_screen->add_help_tab(array(
				'id' => 'general_help_tab2',
				'title' => __('Client Access', 'wp-adpress'),
				'content' => '<h2>' . __('Client Access', 'wp-adpress') . '</h2>' .
				'<p>' . __('To purchase Ads, the users must first register in your WordPress Blog. When they are registered, they get assigned a role. (By default, it\'s subscriber. You should set the role which will have a access the client area. As such, only a particular group can purchase Ads.', 'wp-adpress') . '</p>' .
				'<li>' . __('<strong>Client Role</strong> Displays all the role in your WordPress setup.', 'wp-adpress') . '</li>' .
				'<li>' . __('<strong>Auto Approve</strong> Disable Ads moderation. Purchased Ads will automatically run.', 'wp-adpress') . '</li>' .
				'<li>' . __('<strong>Client Message</strong> Enable the client to enter a message when purchasing the form.', 'wp-adpress') . '</li>'
			));
			$current_screen->add_help_tab(array(
				'id' => 'general_help_tab3',
				'title' => __('PayPal Settings', 'wp-adpress'),
				'content' => '<h2>' . __('PayPal Settings', 'wp-adpress') . '</h2>' .
				'<p>' . __('Using the PayPal integration (PayPal ExpressCheckout), Advertisers can pay directly without your intervention when purchasing an Ad. AdPress makes the setup easy to use. You just need to enter your PayPal merchant account information, and set few settings.', 'wp-adpress') . '</p>' .
				'<h2>' . __('Express Checkout', 'wp-adpress') . '</h2>' .
				'<p>PayPal Expresscheck is a convenient solution to process payment online. First, make sure you know how <a href="https://merchant.paypal.com/us/cgi-bin/?cmd=_render-content&content_ID=merchant/express_checkout">it works</a>. Second, you need to create a business/merchant account to get your account user name, password and signature.' .
				'<h2>' . __('SandBox mode', 'wp-adpress') . '</h2>' .
				'<p>' . __('If you are new to PayPal Express Checkout, please sign up for their <a href="https://developer.paypal.com">Sandbox test suite</a> and get used to how PayPal works. PayPal has got a sandbox mode, which is a virtual platform similar to the one running PayPal. Its purpose is to make tests and see how it works before trying in real life. By checking this box, you enable the Sandbox mode.', 'wp-adpress') .
				'<h2>' . __('Refunds', 'wp-adpress') . '</h2>' .
				'<p>' . __('AdPress supports refunds. When a purchaser make a purchase and it gets rejected (or cancels it before running), it makes sense to refund the payment. If refunds are enabled, rejecting the Ad will automatically issue the refund.', 'wp-adpress') . '</p>'
			));
			$current_screen->add_help_tab(array(
				'id' => 'general_help_tab4',
				'title' => __('Purchase History', 'wp-adpress'),
				'content' => '<h2>' . __('Purchase History', 'wp-adpress') . '</h2>' .
				'<p>' . __('AdPress can record all the ad purchases. History is enabled by default. The history is accessible through the "History" tab.', 'wp-adpress') . '</p>' .
				'<h3>' . __('Removing History', 'wp-adpress') . '</h3>' .
				'<p>' . __('History can consume a huge amount of space in your database after some time. It can be useful to empty the cache to free some space in your database.', 'wp-adpress') . '</p>'
			));
			break;
		case 'image_ad':
			$current_screen->add_help_tab(array(
				'id' => 'image_help_tab1',
				'title' => __('Image Ad'),
				'content' => '<h2>' . __('Image Ad', 'wp-adpress') . '</h2>' .
				'<p>' . __('You can customize fully how you ads look like. For example, you can add a border to your images Ads. You can also change or add some text or HTML code.', 'wp-adpress') . '</p>'
			));
			$current_screen->add_help_tab(array(
				'id' => 'image_help_tab2',
				'title' => __('HTML Code', 'wp-adpress'),
				'content' => '<h2>' . __('HTML Code', 'wp-adpress') . '</h2>' .
				'<p>' . __('This is the HTML code for each Ad spot. There some variables that the plug-in fills automatically.', 'wp-adpress') . '</p>' .
				'<li>' . __('<strong>@url</strong> The Ad target URL.', 'wp-adpress') . '</li>' .
				'<li>' . __('<strong>@image_src</strong> The image URL.', 'wp-adpress') . '</li>'
			));
			$current_screen->add_help_tab(array(
				'id' => 'image_help_tab3',
				'title' => __('CSS Style', 'wp-adpress'),
				'content' => '<h2>' . __('CSS Style', 'wp-adpress') . '</h2>' .
				'<p>' . __('The CSS styles added here will be loaded in every page on your blog. They should be targeted for your Ad Widget. For that purpose, AdPress makes use of the <em>image-campaign</em> class. All your styles should be nested beneath this class to avoid conflicts with other CSS rules.', 'wp-adpress')
			));
			break;
		case 'link_ad':
			$current_screen->add_help_tab(array(
				'id' => 'image_help_tab1',
				'title' => __('Link Ad'),
				'content' => '<h2>' . __('Link Ad', 'wp-adpress') . '</h2>' .
				'<p>' . __('You can customize fully how you link ads look like. For example, you can change how your Ads links look like (color, font...). You can also change or add some text or HTML code.', 'wp-adpress') . '</p>'
			));
			$current_screen->add_help_tab(array(
				'id' => 'image_help_tab2',
				'title' => __('HTML Code', 'wp-adpress'),
				'content' => '<h2>' . __('HTML Code', 'wp-adpress') . '</h2>' .
				'<p>' . __('This is the HTML code for each Ad spot. There some variables that the plug-in fills automatically.', 'wp-adpress') . '</p>' .
				'<li>' . __('<strong>@url</strong> The Ad target URL.', 'wp-adpress') . '</li>' .
				'<li>' . __('<strong>@link_text</strong> The link text.', 'wp-adpress') . '</li>'
			));
			$current_screen->add_help_tab(array(
				'id' => 'image_help_tab3',
				'title' => __('CSS Style', 'wp-adpress'),
				'content' => '<h2>' . __('CSS Style', 'wp-adpress') . '</h2>' .
				'<p>' . __('The CSS styles added here will be loaded in every page on your blog. They should be targeted for your Ad Widget. For that purpose, AdPress makes use of the <em>link-campaign</em> class. All your styles should be nested beneath this class to avoid conflicts with other CSS rules.', 'wp-adpress')
			));
			break;
		case 'history':
			$current_screen->add_help_tab(array(
				'id' => 'history_help_tab',
				'title' => __('Purchase History'),
				'content' => '<h2>' . __('Purchase History', 'wp-adpress') . '</h2>' .
				'<p>' . __('You find here the history of all Ad purchases and requests. Each Ad request, purchase and expiration (also rejection or cancelation) is recorded. You can clear the History from the General Settings Panel.', 'wp-adpress') . '</p>',
				));
			break;
		case 'import':
			$current_screen->add_help_tab(array(
				'id' => 'history_help_export',
				'title' => __('Export'),
				'content' => '<h2>' . __('Export', 'wp-adpress') . '</h2>' .
				'<p>' . __('Use this option to export your settings and data to a back-up file. After clicking the "Export" button, a message will appear and asks you to download the back-up file. Download this file and store it in a safe location.', 'wp-adpress') . '</p>' .
				'<ul>' .
				'<li>' . __('<strong>Settings Data</strong> Export only your current settings parameters', 'wp-adpress') . '</li>' .
				'<li>' . __('<strong>Campaign Data</strong> Export all campaigns and ads (running or pending)', 'wp-adpress') . '</li>' .
				'<li>' . __('<strong>Settings Data</strong> Export the purchase history', 'wp-adpress') . '</li>' .
				'</ul>'
			));
			$current_screen->add_help_tab(array(
				'id' => 'history_help_import',
				'title' => __('Import'),
				'content' => '<h2>' . __('Import', 'wp-adpress') . '</h2>' .
				'<h3>' . __('Warning', 'wp-adpress') . '</h3>' .
				'<p>' . __('This function will erase all your current data. It doesn\'t do a merge. Your settings, campaign or history data will be fully replaced. Make sure you do a back-up of your current configuration and data before doing an import.', 'wp-adpress') . '</p>' .
				'<h3>' . __('Back-up file', 'wp-adpress') . '</h3>' .
				'<p>' . __('Your back-up file should contain the data you are looking to import. For example, if you want to import history data, the back-up file must have this data.', 'wp-adpress') . '</p>' .
				'<h3>' . __('Select items', 'wp-adpress') . '</h3>' .
				'<p>' . __('You can have a full back-up data, but only import one or a couple of items. For example, if you want to import plug-in settings, just check the settings data box. Your campaign and history data won\'t be changed.', 'wp-adpress') . '</p>'

			));
			$current_screen->add_help_tab(array(
				'id' => 'history_help_reset',
				'title' => __('Reset Plug-in'),
				'content' => '<h2>' . __('Reset the plug-in', 'wp-adpress') . '</h2>' .
				'<p>' . __('You may find it useful to reset your plug-in settings. You can pick which elements to reset and others to preserve.', 'wp-adpress') . '</p>' .
				'<ul>' .
				'<li>' . __('<strong>Settings</strong> Reset the default plug-in settings', 'wp-adpress') . '</li>' .
				'<li>' . __('<strong>Campaign Data</strong> Remove all campaigns and ads', 'wp-adpress') . '</li>' .
				'<li>' . __('<strong>History Data</strong> Remove all the history', 'wp-adpress') . '</li>' .
				'</ul>'
			));
			break;
		}
		break;
	case $adpress_page_payments:
		$current_screen->add_help_tab(array(
			'id' => 'adpress_page_payments',
			'title' => __('Payments', 'wp-adpress'),
			'content' => '<h2>' . __('Payments', 'wp-adpress') . '</h2>' .
			'<p>' . __('Help Text', 'wp-adpress') . '</p>'
		));
		break;
	case $adpress_page_addons:
		$current_screen->add_help_tab(array(
			'id' => 'adpress_page_addons',
			'title' => __('Add-ons', 'wp-adpress'),
			'content' => '<h2>' . __('Add-ons', 'wp-adpress') . '</h2>' .
			'<p>' . __('Help Text', 'wp-adpress') . '</p>'
		));
		break;
	case $adpress_page_available:
		$current_screen->add_help_tab(array(
			'id' => 'adpress_available_page',
			'title' => __('Available Ads', 'wp-adpress'),
			'content' => '<h2>' . __('Available Ads', 'wp-adpress') . '</h2>' .
			'<p>' . __('You find here all campaigns with Ads available for purchase. Each campaign has a description and set of settings.', 'wp-adpress') . '</p>'
		));
		break;
	case $adpress_page_purchases:
		$current_screen->add_help_tab(array(
			'id' => 'adpress_purchases_page',
			'title' => __('Purchased Ads', 'wp-adpress'),
			'content' => '<h2>' . __('Purchased and Requested Ads', 'wp-adpress') . '</h2>' .
			'<p>' . __('You find here all the Ads requests and purchases you made.', 'wp-adpress') . '</p>'
		));
		break;
	case $adpress_page_purchase:
		$current_screen->add_help_tab(array(
			'id' => 'adpress_purchase_page_tab2',
			'title' => __('Image Ad', 'wp-adpress'),
			'content' => '<h2>' . __('Uploading an image', 'wp-adpress') . '</h2>' .
			'<p>' . __('The plug-in uses the WordPress Media Uploader to upload your image. Make sure you select the right size (Full Size) before inserting the image.') . '</p>' .
			'<h2>' . __('Target URL', 'wp-adpress') . '</h2>' .
			'<p>' . __('Put the target URL that you want visitors to reach. This shouldn\'t be a shorttened URL. AdPress already provides analytics for your Ads.', 'wp-adpress') . '</p>'
		));
		$current_screen->add_help_tab(array(
			'id' => 'adpress_purchase_page_tab3',
			'title' => __('Link Ad', 'wp-adpress'),
			'content' => '<h2>' . __('Link Text', 'wp-adpress') . '</h2>' .
			'<p>' . __('This is the text that will appear for your link. The length of the link text is limited to a certain number of characters mentioned above in the Ad Spot Details.', 'wp-adpress') . '</p>' .
			'<h2>' . __('Target URL', 'wp-adpress') . '</h2>' .
			'<p>' . __('Put the target URL that you want visitors to reach. This shouldn\'t be a shorttened URL. AdPress already provides analytics for your Ads.', 'wp-adpress') . '</p>'
		));
		$current_screen->add_help_tab(array(
			'id' => 'adpress_purchase_page_tab4',
			'title' => __('Client Message', 'wp-adpress'),
			'content' => '<h2>' . __('Client Message', 'wp-adpress') . '</h2>' .
			'<p>' . __('You can enter a message to the website administrator. He\'ll get the message when reviewing your Ad request.', 'wp-adpress') . '</p>' .
			'<p>' . __('<em>This option is not always available.</em>', 'wp-adpress') . '</p>'
		));
		$current_screen->add_help_tab(array(
			'id' => 'adpress_purchase_page_tab5',
			'title' => __('Payment Process', 'wp-adpress'),
			'content' => '<h2>' . __('No Payment gateway', 'wp-adpress') . '</h2>' .
			'<p>' . __('If there is no payment gateway available, then you should contact the website Admin and make the payment manually.', 'wp-adpress') . '</p>' .
			'<h2>' . __('PayPal Payment', 'wp-adpress') . '</h2>' .
			'<p>' . __('If PayPal is enabled, you\'ll be redirected to the PayPal login page to make the payment. Once you complete the payment on the PayPal website, you\'ll be redirected back to the payment page and complete the purchase.', 'wp-adpress') . '</p>'
		));
		break;
	case $adpress_page_ad:
		$current_screen->add_help_tab(array(
			'id' => 'adpress_ad_page_tab1',
			'title' => __('Ad Stats', 'wp-adpress'),
			'content' => '<h2>' . __('Ad Stats', 'wp-adpress') . '</h2>' .
			'<p>' . __('This page provides detailed stats about your Ad.', 'wp-adpress') . '</p>'
		));
		$current_screen->add_help_tab(array(
			'id' => 'adpress_ad_page_tab2',
			'title' => __('Stats Chart', 'wp-adpress'),
			'content' => '<h2>' . __('Stats Chart', 'wp-adpress') . '</h2>' .
			'<p>' . __('The Stats chart displays the last 30 days views and clicks.', 'wp-adpress') . '</p>'
		));
		$current_screen->add_help_tab(array(
			'id' => 'adpress_ad_page_tab3',
			'title' => __('Averages', 'wp-adpress'),
			'content' => '<h2>' . __('Averages', 'wp-adpress') . '</h2>' .
			'<p>' . __('Calculates the average daily views, clicks and click-through-rate', 'wp-adpress') . '</p>'
		));
		$current_screen->add_help_tab(array(
			'id' => 'adpress_ad_page_tab4',
			'title' => __('Complete Stats', 'wp-adpress'),
			'content' => '<h2>' . __('Complete Stats', 'wp-adpress') . '</h2>' .
			'<p>' . __('This provides complete day to day stats of the Ad since it started running', 'wp-adpress') . '</p>'
		));
		break;
	}
}
