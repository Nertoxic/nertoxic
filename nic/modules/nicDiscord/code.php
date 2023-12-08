<?php 
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

$discord = new discord();

class discord

{

    /*
     * Call Discord Webhook
     */
    public function callWebhook($webhook, $content, $img, $name)
    {

        // Check if user provided image
        if($img == 0) {
            $img = $GLOBALS['APP_LOGO'];
        }

        // Use APP Name if no webhook name has been provided
        if($name == 0) {
            $name = $GLOBALS['APP_NAME'];
        }

        // Set date and timestamp
        $date = new DateTime(null, new DateTimeZone('Europe/Berlin'));
        $timestamp = date("c", strtotime("now"));

        $json_data = json_encode([
            
            "content" => "$content",
            
            // Username
            "username" => "$name",

            // Avatar URL.
            // Uncoment to replace image set in webhook
            "avatar_url" => "https://cdn.clusternode.net/image/s/clusternode_net.png",

            // Text-to-speech
            "tts" => false,

            // File upload
            // "file" => "",

            // Embeds Array

        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


        $ch = curl_init( $webhook );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt( $ch, CURLOPT_POST, 1);
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt( $ch, CURLOPT_HEADER, 0);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec( $ch );
        curl_close( $ch );
        
    }

}
?>