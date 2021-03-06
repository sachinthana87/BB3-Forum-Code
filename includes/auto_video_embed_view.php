<?php
/**
*
* @package Auto Video Embed  v.0.0.3
* @version $Id: auto_video_embed_view.php 2356 2012-02-10 21:10:05Z 4seven$
* @copyright (c) 2012 / 4seven
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
* Note: This file is included for use in viewtopic.php, which controls post/thread rendering.
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

// ---------------- CONFIG ---------------
// change from true to false to switch off
// enter width and height numeric, without px
#
$clipfish            = true;
$clipfish_width      = 464;
$clipfish_height     = 384;
#
$dailymotion         = true;
$dailymotion_width   = 420;
$dailymotion_height  = 336;
# 
$facebook            = true;
$facebook_width      = 400;
$facebook_height     = 300;
#
$flv                 = true;
$flv_width           = 425;
$flv_height          = 350;
#
$gametrailers        = true;
$gametrailers_width  = 640;
$gametrailers_height = 360;
#
$googlevideo  = true;
$metacafe     = true;
$mixcloud     = true;
$mp3          = true;
$myspace      = true;
$myvideo      = true;
$veoh         = true;
$vimeo        = true;
$yahoo        = true;
// Activate $youtube or $youtube_lnk. Not both!
$youtube      = true;
$youtube_lnk  = false;  //Enables a link which opens a spoiler-div to show embedded object.
// activate $youtube_new for youtu.be support
$youtube_new  = true;
#
// ---------------- CONFIG ---------------

// Auto Video Embed  v.0.0.3 / 4seven / 2012

// Debuging tool
//$message = $message . htmlentities( $message );

// clipfish
if (($clipfish) && (strpos($message, 'clipfish.de') !== false)) {
    $message = preg_replace('#<a class="postlink" href="https?:\/\/([^>"]*)clipfish\.de\/video\/([^>"]*)"[^>]*>([^>]*)<\/a>#is', '<object width="' . $clipfish_width . '" height="' . $clipfish_height . '" type="application/x-shockwave-flash" data="http://www.clipfish.de/cfng/flash/clipfish_player_3.swf" style="visibility: visible;"><param name="quality" value="high" /><param name="wmode" value="opaque" /><param name="allowscriptaccess" value="always" /><param name="allowfullscreen" value="true" /><param name="flashvars" value="data=http://www.clipfish.de/devxml/videoinfo/$2&amp;ec=http://www.clipfish.de/embed/video/$2&amp;vid=$2" /></object>', $message);
}

// dailymotion
if (($dailymotion) && (strpos($message, 'dailymotion.') !== false)) {
    $message = preg_replace('#<a class="postlink" href="https?:\/\/([^>"]*)dailymotion([^>"]*)\/video\/([^>"]*)"[^>]*>([^>]*)<\/a>#is', '<object type="application/x-shockwave-flash" style="width:' . $dailymotion_width . 'px;height:' . $dailymotion_height . 'px;" data="http://www.dailymotion$2/swf/$3"><param name="movie" value="http://www.dailymotion.$2/swf/$3" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /></object>', $message);
}

// facebook
if (($facebook) && (strpos($message, 'facebook.com/video/video.php') !== false)) {
    $message = preg_replace('#<a class="postlink" href="https?:\/\/([^>"]*)facebook\.com\/video\/video\.php\?v=([^>"]*)"[^>]*>([^>]*)<\/a>#is', '<object type="application/x-shockwave-flash" style="width:' . $facebook_width . 'px;height:' . $facebook_height . 'px;" data="http://www.facebook.com/v/$2"><param name="movie" value="http://www.facebook.com/v/$2" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /></object>', $message);
}

// flv
if (($flv) && ((strpos($message, '.flv"') !== false) or (strpos($message, '.FLV"') !== false))) {
    // remote link
    $message = preg_replace('#<a class="postlink" href="https?:\/\/([^>"]*)\.(flv|FLV)"([^>"]*)[^<]*>([^>]*)<\/a>#is', '<object type="application/x-shockwave-flash" style="width:' . $flv_width . 'px;height:' . $flv_height . 'px;" data="mediaplayer/flv_player.swf"><param name="movie" value="mediaplayer/flv_player.swf" /><param name="allowfullscreen" value="true" /><param name="flashvars" value="file=http://$1.flv" /></object>', $message);
    // local link
    $message = preg_replace('#<a class="postlink-local" href="https?:\/\/([^>"]*)\.(flv|FLV)"([^>"]*)[^<]*>([^>]*)<\/a>#is', '<object type="application/x-shockwave-flash" style="width:' . $flv_width . 'px;height:' . $flv_height . 'px;" data="mediaplayer/flv_player.swf"><param name="movie" value="mediaplayer/flv_player.swf" /><param name="allowfullscreen" value="true" /><param name="flashvars" value="file=http://$1.flv" /></object>', $message);
}

// gametrailers
if (($gametrailers) && (strpos($message, 'gametrailers.com/video/') !== false)) {
    $message = preg_replace('#<a class="postlink" href="https?:\/\/([^>"]*)gametrailers\.com\/video\/([^>"]*)\/([^>"]*)"[^>]*>([^>]*)<\/a>#is', '<!--[if !IE]> --><object type="application/x-shockwave-flash" width="' . $gametrailers_width . '" height="' . $gametrailers_height . '" data="http://media.mtvnservices.com/mgid:moses:video:gametrailers.com:$3"><param name="AllowScriptAccess" value="sameDomain" /><param name="allowFullScreen" value="true" /><param name="base" value="." /><param name="flashVars" value="" /></object><!-- <![endif]--><!--[if IE]><embed width="' . $gametrailers_width . '" height="' . $gametrailers_height . '" src="http://media.mtvnservices.com/mgid:moses:video:gametrailers.com:$3" quality="high" bgcolor="000000" name="efp" align="middle" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" flashvars="autoPlay=false" allowfullscreen="true"></embed><![endif]-->', $message);
}

// googlevideo
if (($googlevideo) && (strpos($message, '/videoplay?docid=') !== false)) {
    $message = preg_replace('#<a class="postlink" href="https?:\/\/video.google([^>"]*)\/videoplay\?docid=([^>"]*)"[^>]*>([^>]*)<\/a>#is', '<object type="application/x-shockwave-flash" style="width:450px; height:330px;" data="http://video.google$1/googleplayer.swf?docId=$2&amp;fs=true"><param name="movie" value="http://video.google$1/googleplayer.swf?docId=$2&amp;fs=true" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /></object>', $message);
}

//metacafe
if (($metacafe) && (strpos($message, 'metacafe.com/watch/') !== false)) {
    $message = preg_replace('#<a class="postlink" href="https?:\/\/([^>"]*)metacafe\.com\/watch\/([^>"]*)\/([^>"]*)"[^>]*>([^>]*)<\/a>#is', '<object type="application/x-shockwave-flash" style="height:345px;width:400px;" data="http://www.metacafe.com/fplayer/$2/$3.swf"><param name="movie" value="http://www.metacafe.com/fplayer/$2/$3.swf" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /></object>', $message);
}

// mixcloud
if (($mixcloud) && (strpos($message, 'mixcloud.com/') !== false)) {
    $message = preg_replace('#<a class="postlink" href="https?:\/\/([^>"]*)mixcloud\.com\/([^>"]*)"[^>]*>([^>]*)<\/a>#is', '<object type="application/x-shockwave-flash" data="http://www.mixcloud.com/media/swf/player/mixcloudLoader.swf?v=20" width="300" height="300"><param name="movie" value="http://www.mixcloud.com/media/swf/player/mixcloudLoader.swf?v=20" /><param name="flashvars" value="feed=http://www.mixcloud.com/$2" /><param name="allowscriptaccess" value="always" /><param name="allowfullscreen" value="true" /><param name="quality" value="high" /></object>', $message);
}

// mp3
if (($mp3) && ((strpos($message, '.mp3">') !== false) or (strpos($message, '.MP3">') !== false))) {
    // remote link
    $message = preg_replace('#<a class="postlink" href="https?:\/\/([^>"]*)\.mp3"[^>]*>([^>]*)<\/a>#is', '<object type="application/x-shockwave-flash" data="mediaplayer/mp3_player.swf" width="200" height="55"><param name="movie" value="mediaplayer/mp3_player.swf" /><param name="flashvars" value="src=http://$1.mp3" /></object>', $message);
    // local link
    $message = preg_replace('#<a class="postlink-local" href="https?:\/\/([^>"]*)\.mp3"[^>]*>([^>]*)<\/a>#is', '<object type="application/x-shockwave-flash" data="mediaplayer/mp3_player.swf" width="200" height="55"><param name="movie" value="mediaplayer/mp3_player.swf" /><param name="flashvars" value="src=http://$1.mp3" /></object>', $message);
}

// myspace
if (($myspace) && (strpos($message, 'vids.myspace.com/index.cfm') !== false)) {
    $message = preg_replace('#<a class="postlink" href="https?:\/\/vids\.myspace\.com\/index\.cfm\?fuseaction=vids\.individual&amp;videoid=([^>"]*)"[^>]*>([^>]*)<\/a>#is', '<object type="application/x-shockwave-flash" style="width:425px; height:360px;" data="http://mediaservices.myspace.com/services/media/embed.aspx/m=$1,t=1,mt=video"><param name="movie" value="http://mediaservices.myspace.com/services/media/embed.aspx/m=$1,t=1,mt=video" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /></object>', $message);
}

// myvideo
if (($myvideo) && (strpos($message, 'myvideo.de/watch/') !== false)) {
    $message = preg_replace('#<a class="postlink" href="https?:\/\/([^>"]*)myvideo\.de\/watch\/([^>"]*)"[^>]*>([^>]*)<\/a>#is', '<object type="application/x-shockwave-flash" style="width:425px; height:350px" data="http://www.myvideo.de/movie/$2"><param name="movie" value="http://www.myvideo.de/movie/$2" /><param name="allowfullscreen" value="true" /></object>', $message);
}

// veoh
if (($veoh) && (strpos($message, 'veoh.com/') !== false)) {
    $message = preg_replace('#<a class="postlink" href="https?:\/\/([^>"]*)veoh.com\/([^>"]*)\/watch\/([^>"]*)"[^>]*>([^>]*)<\/a>#is', 
    '<object type="application/x-shockwave-flash" style="width:410px;height:341px;" class="veohFlashplayer" name="veohFlashPlayer" data="http://www.veoh.com/static/swf/webplayer/WebPlayer.swf?version=AFrontend.5.4.2.1021&amp;permalinkId=$3&amp;player=videodetailsembedded&amp;videoAutoPlay=0&amp;id=anonymous"><param name="movie" value="http://www.veoh.com/static/swf/webplayer/WebPlayer.swf?version=AFrontend.5.4.2.1021&amp;permalinkId=$3&amp;player=videodetailsembedded&amp;videoAutoPlay=0&amp;id=anonymous" /><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /></object>', $message);
}

// vimeo
if (($vimeo) && (strpos($message, 'vimeo.com/') !== false)) {
    $message = preg_replace('#<a class="postlink" href="https?:\/\/([^>"]*)vimeo\.com\/([^>"]*)"[^>]*>([^>]*)<\/a>#is', '<object type="application/x-shockwave-flash" style="width:400px;height:230px;" data="http://vimeo.com/moogaloop.swf?clip_id=$2&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=$2&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=1&amp;show_portrait=0&amp;color=&amp;fullscreen=1" /></object>', $message);
}

// yahoo
// reminder: checking yahoo fullscreen mode availability
if (($yahoo) && (strpos($message, 'video.yahoo.com/') !== false)) {
    $message = preg_replace('#<a class="postlink" href="https?:\/\/([^>"]*)video\.yahoo\.com\/([^>"]*)\/([^>"]*)\/([^>"]*)-([^>"]*).html"[^>]*>([^>]*)<\/a>#is', '<object type="application/x-shockwave-flash" data="http://d.yimg.com/nl/vyc/site/player.swf" width="630" height="354"><param name="movie" value="http://d.yimg.com/nl/vyc/site/player.swf" /><param name="flashvars" value="vid=$5&amp;autoPlay=false&amp;volume=100&amp;enableFullScreen=1&amp;lang=$1" /><param name="quality" value="high" /></object>', $message);
}

// youtube
if (($youtube) && (strpos($message, '/watch?v=') !== false))
{
    $message = preg_replace('#<a class="postlink" href="https?:\/\/([^>"]*)youtube([^>"]*)\/watch\?v=([^>"]*)"[^>]*>([^>]*)<\/a>#is', '<object type="application/x-shockwave-flash" style="width:425px; height:344px" data="http://$1youtube$2/v/$3"><param name="movie" value="http://$1youtube$2/v/$3&amp;hl=de&amp;fs=1&amp;rel=0&amp;hd=1" /><param name="allowfullscreen" value="true" /></object>', $message);
}

// youtube_lnk
if (($youtube_lnk) && (strpos($message, '/watch?v=') !== false))
{
    $message = preg_replace('#<a class="postlink" href="https?:\/\/([^>"]*)youtube([^>"]*)\/watch\?v=([A-Za-z0-9]+)([^>"]*)"[^>]*>([^>]*)<\/a>#is', '<a href="http://$1youtube$2/v/$3$4&amp;hl=en&amp;fs=1&amp;rel=0&amp;hd=1">http://$1youtube$2/watch?v=$3$4&amp;hl=en&amp;fs=1&amp;rel=0&amp;hd=1</a>&nbsp;&nbsp;&nbsp;<span style="cursor:pointer;" onclick="spoile(&apos;yt_'.$row['post_id'].'$3&apos;);"><img src="images/embed.gif" alt="" /></span><div id="yt_'.$row['post_id'].'$3" style="display:none;"><br /><object type="application/x-shockwave-flash" style="width:425px; height:344px" data="http://$1youtube$2/v/$3$4&amp;hl=en&amp;fs=1&amp;rel=0&amp;hd=1"><param name="movie" value="http://$1youtube$2/v/$3$4&amp;hl=en&amp;fs=1&amp;rel=0&amp;hd=1" /><param name="allowfullscreen" value="true" /></object></div>', $message);
}

// youtube_new
if (($youtube_new) && (strpos($message, 'youtu.be/') !== false)) {
    $message = preg_replace('#<a class="postlink" href="https?:\/\/([^>"]*)youtu.be\/([^>"]*)"[^>]*>([^>]*)<\/a>#is', '<object type="application/x-shockwave-flash" style="width:425px; height:344px" data="http://youtube.com/v/$2&amp;hl=en&amp;fs=1&amp;rel=0&amp;hd=1"><param name="movie" value="http://youtube.com/v/$2&amp;hl=en&amp;fs=1&amp;rel=0&amp;hd=1" /><param name="allowfullscreen" value="true" /></object>', $message);
}

// Auto Video Embed  v.0.0.3 / 4seven / 2012

?>
