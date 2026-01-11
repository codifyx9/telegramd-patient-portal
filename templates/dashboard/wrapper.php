<?php
defined('ABSPATH') || exit;

// page is not used by anything but this should be used becuase its better approach
$page = $_GET['page'] ?? null;
// Support ?payment-succeeded format
if (!$page) {
    foreach ($_GET as $key => $value) {
        $page = $key;
        break;
    }
}

switch ($page) {
    case 'care-team':
        include HLD_PLUGIN_PATH . 'templates/dashboard/care-team-chat.php';
        break;

    case 'payment-succeeded':
        include HLD_PLUGIN_PATH . 'templates/dashboard/payment-succeeded.php';
        break;

    case 'questionnaire-answered':
        include HLD_PLUGIN_PATH . 'templates/dashboard/questionnaire-answered.php';
        break;

    default:
        // default dashboard code is in this file
        include HLD_PLUGIN_PATH . 'templates/dashboard/default.php';
        break;
}
