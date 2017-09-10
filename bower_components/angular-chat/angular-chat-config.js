'use strict';

// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
// AngularJS Chat Configuration
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
angular.module('chat').constant( 'config', {
    //
    // Get your API Keys -> https://admin.pubnub.com/#/register
    //
    "pubnub": {
        "publish-key"   : "pub-c-1e0bd0c6-7cc4-4011-8635-9a1c8c3899c8",
        "subscribe-key" : "sub-c-e92bbf3e-4a0f-11e7-b847-0619f8945a4f"
    }
} );
