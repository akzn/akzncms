<div class="resp-sharing">

<style>
    .resp-sharing-button__link{
        color:white!important
    }
</style>

<?php
    $desc = (isset($title) && $title!='') ? $title : $site['metatitle'];
    $image = base_url().$image_path.$product['image']
?>

<!-- Sharingbutton Facebook -->

<a class="resp-sharing-button__link" href='https://www.facebook.com/sharer/sharer.php?u=<?=current_url()?>' target="_blank" rel="noopener" aria-label="Facebook" title='Share on Facebook'>
  <div class="resp-sharing-button resp-sharing-button--facebook"><div aria-hidden="true" class="resp-sharing-button__icon">
    <svg viewBox="0 0 24 24"><path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/></svg></div><span>Facebook</span></div>
</a>



<!-- Sharingbutton Twitter --> 

<a class="resp-sharing-button__link" href='https://twitter.com/intent/tweet?text=<?=$desc?>&url=<?=current_url()?>' target="_blank" rel="noopener" aria-label="Twitter" title='Share on Twitter'>
  <div class="resp-sharing-button resp-sharing-button--twitter"><div aria-hidden="true" class="resp-sharing-button__icon">
  <svg viewBox="0 0 24 24"><path d="M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z"/></svg></div><span>Twitter</span></div>
</a>



<!-- Sharingbutton Pinterest -->

<a class="resp-sharing-button__link" href='http://pinterest.com/pin/create/button/?url=<?=current_url()?>&media=<?=$image?>&description=<?=$desc?>' target="_blank" rel="noopener" aria-label="Pinterest" title='Share on Pinterest'>
  <div class="resp-sharing-button resp-sharing-button--pinterest"><div aria-hidden="true" class="resp-sharing-button__icon">
  <svg viewBox="0 0 24 24"><path d="M12.14.5C5.86.5 2.7 5 2.7 8.75c0 2.27.86 4.3 2.7 5.05.3.12.57 0 .66-.33l.27-1.06c.1-.32.06-.44-.2-.73-.52-.62-.86-1.44-.86-2.6 0-3.33 2.5-6.32 6.5-6.32 3.55 0 5.5 2.17 5.5 5.07 0 3.8-1.7 7.02-4.2 7.02-1.37 0-2.4-1.14-2.07-2.54.4-1.68 1.16-3.48 1.16-4.7 0-1.07-.58-1.98-1.78-1.98-1.4 0-2.55 1.47-2.55 3.42 0 1.25.43 2.1.43 2.1l-1.7 7.2c-.5 2.13-.08 4.75-.04 5 .02.17.22.2.3.1.14-.18 1.82-2.26 2.4-4.33.16-.58.93-3.63.93-3.63.45.88 1.8 1.65 3.22 1.65 4.25 0 7.13-3.87 7.13-9.05C20.5 4.15 17.18.5 12.14.5z"/></svg></div><span>Pinterest</span></div>
</a>



<!-- Sharingbutton More -->

<div class="resp-sharing-button__link" aria-label='More' onclick='document.getElementById("share_more").style.display="block";document.getElementById("min-share").style.display="inline-block";document.getElementById("plus-share").style.display="none"' role='button' tabindex='0' id='plus-share'>
  <div class="resp-sharing-button resp-sharing-button--more"><div aria-hidden="true" class="resp-sharing-button__icon">
  <svg viewBox="0 0 32 32"><path d="M18 14V8h-4v6H8v4h6v6h4v-6h6v-4h-6z"/></svg></div><span>More</span></div>
</div>
<div class="resp-sharing-button__link" aria-label='Less' onclick='document.getElementById("share_more").style.display="none";document.getElementById("min-share").style.display="none";document.getElementById("plus-share").style.display="inline-block"' role='button' tabindex='0' id='min-share'>
  <div class="resp-sharing-button resp-sharing-button--more"><div aria-hidden="true" class="resp-sharing-button__icon">
  <svg viewBox="0 0 24 24"><path d="M20,14H4V10H20"/></svg></div><span>Less</span></div>
</div>


<div class="resp-sharing-more-content" id="share_more">



<!-- Sharingbutton Tumblr --> 


<a class="resp-sharing-button__link" href='&quot;http://tumblr.com/share/link?url=&quot; + data:post.canonicalUrl + &quot;&amp;name=&quot; + data:post.title + &quot;&amp;description=&quot; + data:post.snippet' target="_blank" rel="noopener" aria-label="Tumblr" title='Share on Tumblr'>
  <div class="resp-sharing-button resp-sharing-button--tumblr"><div aria-hidden="true" class="resp-sharing-button__icon">
  <svg viewBox="0 0 24 24"><path d="M13.5.5v5h5v4h-5V15c0 5 3.5 4.4 6 2.8v4.4c-6.7 3.2-12 0-12-4.2V9.5h-3V6.7c1-.3 2.2-.7 3-1.3.5-.5 1-1.2 1.4-2 .3-.7.6-1.7.7-3h3.8z"/></svg></div><span>Tumblr</span></div>
</a>


<!-- Sharingbutton E-Mail -->

<a class="resp-sharing-button__link" href='&quot;mailto:?subject=&quot; + data:post.title + &quot;&amp;body=&quot; + data:post.canonicalUrl' target="_self" rel="noopener" aria-label="E-Mail" title='Share on Email'>
  <div class="resp-sharing-button resp-sharing-button--email"><div aria-hidden="true" class="resp-sharing-button__icon">
  <svg viewBox="0 0 24 24"><path d="M22 4H2C.9 4 0 4.9 0 6v12c0 1.1.9 2 2 2h20c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zM7.25 14.43l-3.5 2c-.08.05-.17.07-.25.07-.17 0-.34-.1-.43-.25-.14-.24-.06-.55.18-.68l3.5-2c.24-.14.55-.06.68.18.14.24.06.55-.18.68zm4.75.07c-.1 0-.2-.03-.27-.08l-8.5-5.5c-.23-.15-.3-.46-.15-.7.15-.22.46-.3.7-.14L12 13.4l8.23-5.32c.23-.15.54-.08.7.15.14.23.07.54-.16.7l-8.5 5.5c-.08.04-.17.07-.27.07zm8.93 1.75c-.1.16-.26.25-.43.25-.08 0-.17-.02-.25-.07l-3.5-2c-.24-.13-.32-.44-.18-.68s.44-.32.68-.18l3.5 2c.24.13.32.44.18.68z"/></svg></div><span>E-Mail</span></div>
</a>



<!-- Sharingbutton GMail -->

<a aria-label='GMail' class='resp-sharing-button__link' href='&quot;https://mail.google.com/mail/u/0/?view=cm&amp;ui=2&amp;tf=0&amp;fs=1&amp;su=&quot; + data:post.title + &quot;&amp;body=&quot; + data:post.canonicalUrl' rel='noopener' target='_blank' title='Share on Gmail'>
  <div class='resp-sharing-button resp-sharing-button--gmail'><div aria-hidden='true' class='resp-sharing-button__icon'>
  <svg viewBox='0 0 24 24'><path d='M20,18H18V9.25L12,13L6,9.25V18H4V6H5.2L12,10.25L18.8,6H20M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z'/></svg></div><span>GMail</span></div>
</a>



<!-- Sharingbutton LinkedIn -->

<a class="resp-sharing-button__link" href='&quot;http://www.linkedin.com/shareArticle?mini=true&amp;url=&quot; + data:post.canonicalUrl' target="_blank" rel="noopener" aria-label="LinkedIn" title='Share on LinkedIn'>
  <div class="resp-sharing-button resp-sharing-button--linkedin"><div aria-hidden="true" class="resp-sharing-button__icon">
  <svg viewBox="0 0 24 24"><path d="M6.5 21.5h-5v-13h5v13zM4 6.5C2.5 6.5 1.5 5.3 1.5 4s1-2.4 2.5-2.4c1.6 0 2.5 1 2.6 2.5 0 1.4-1 2.5-2.6 2.5zm11.5 6c-1 0-2 1-2 2v7h-5v-13h5V10s1.6-1.5 4-1.5c3 0 5 2.2 5 6.3v6.7h-5v-7c0-1-1-2-2-2z"/></svg></div><span>LinkedIn</span></div>
</a>



<!-- Sharingbutton Reddit --> 

<a class="resp-sharing-button__link" href='&quot;https://reddit.com/submit/?url=&quot; + data:post.canonicalUrl + &quot;&amp;resubmit=true&amp;title=&quot; + data:post.title' target="_blank" rel="noopener" aria-label="Reddit" title='Share on Reddit'>
  <div class="resp-sharing-button resp-sharing-button--reddit"><div aria-hidden="true" class="resp-sharing-button__icon">
  <svg viewBox="0 0 24 24"><path d="M24 11.5c0-1.65-1.35-3-3-3-.96 0-1.86.48-2.42 1.24-1.64-1-3.75-1.64-6.07-1.72.08-1.1.4-3.05 1.52-3.7.72-.4 1.73-.24 3 .5C17.2 6.3 18.46 7.5 20 7.5c1.65 0 3-1.35 3-3s-1.35-3-3-3c-1.38 0-2.54.94-2.88 2.22-1.43-.72-2.64-.8-3.6-.25-1.64.94-1.95 3.47-2 4.55-2.33.08-4.45.7-6.1 1.72C4.86 8.98 3.96 8.5 3 8.5c-1.65 0-3 1.35-3 3 0 1.32.84 2.44 2.05 2.84-.03.22-.05.44-.05.66 0 3.86 4.5 7 10 7s10-3.14 10-7c0-.22-.02-.44-.05-.66 1.2-.4 2.05-1.54 2.05-2.84zM2.3 13.37C1.5 13.07 1 12.35 1 11.5c0-1.1.9-2 2-2 .64 0 1.22.32 1.6.82-1.1.85-1.92 1.9-2.3 3.05zm3.7.13c0-1.1.9-2 2-2s2 .9 2 2-.9 2-2 2-2-.9-2-2zm9.8 4.8c-1.08.63-2.42.96-3.8.96-1.4 0-2.74-.34-3.8-.95-.24-.13-.32-.44-.2-.68.15-.24.46-.32.7-.18 1.83 1.06 4.76 1.06 6.6 0 .23-.13.53-.05.67.2.14.23.06.54-.18.67zm.2-2.8c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm5.7-2.13c-.38-1.16-1.2-2.2-2.3-3.05.38-.5.97-.82 1.6-.82 1.1 0 2 .9 2 2 0 .84-.53 1.57-1.3 1.87z"/></svg></div><span>Reddit</span></div>
</a>


<!-- Sharingbutton WhatsApp --> 

<a class="resp-sharing-button__link" data-action='share/whatsapp/share' href='&quot;whatsapp://send?text=&quot; + data:post.title + &quot;%3A%20&quot; + data:post.canonicalUrl' target="_blank" rel="noopener" aria-label="WhatsApp" title='Share on WhatsApp'>
  <div class="resp-sharing-button resp-sharing-button--whatsapp"><div aria-hidden="true" class="resp-sharing-button__icon">
  <svg viewBox="0 0 24 24"><path d="M20.1 3.9C17.9 1.7 15 .5 12 .5 5.8.5.7 5.6.7 11.9c0 2 .5 3.9 1.5 5.6L.6 23.4l6-1.6c1.6.9 3.5 1.3 5.4 1.3 6.3 0 11.4-5.1 11.4-11.4-.1-2.8-1.2-5.7-3.3-7.8zM12 21.4c-1.7 0-3.3-.5-4.8-1.3l-.4-.2-3.5 1 1-3.4L4 17c-1-1.5-1.4-3.2-1.4-5.1 0-5.2 4.2-9.4 9.4-9.4 2.5 0 4.9 1 6.7 2.8 1.8 1.8 2.8 4.2 2.8 6.7-.1 5.2-4.3 9.4-9.5 9.4zm5.1-7.1c-.3-.1-1.7-.9-1.9-1-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.1-.2.2-.3.2-.6.1s-1.2-.5-2.3-1.4c-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.6s.3-.3.4-.5c.2-.1.3-.3.4-.5.1-.2 0-.4 0-.5C10 9 9.3 7.6 9 7c-.1-.4-.4-.3-.5-.3h-.6s-.4.1-.7.3c-.3.3-1 1-1 2.4s1 2.8 1.1 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.6-.1 1.7-.7 1.9-1.3.2-.7.2-1.2.2-1.3-.1-.3-.3-.4-.6-.5z"/></svg></div><span>WhatsApp</span></div>
</a> 

<!-- Sharingbutton Telegram -->

<a class="resp-sharing-button__link" href='&quot;https://telegram.me/share/url?text=&quot; + data:post.title + &quot;&amp;url=&quot; + data:post.canonicalUrl' target="_blank" rel="noopener" aria-label="Telegram" title='Share on Telegram'>
  <div class="resp-sharing-button resp-sharing-button--telegram"><div aria-hidden="true" class="resp-sharing-button__icon">
  <svg viewBox="0 0 24 24"><path d="M.707 8.475C.275 8.64 0 9.508 0 9.508s.284.867.718 1.03l5.09 1.897 1.986 6.38a1.102 1.102 0 0 0 1.75.527l2.96-2.41a.405.405 0 0 1 .494-.013l5.34 3.87a1.1 1.1 0 0 0 1.046.135 1.1 1.1 0 0 0 .682-.803l3.91-18.795A1.102 1.102 0 0 0 22.5.075L.706 8.475z"/></svg></div><span>Telegram</span></div>
</a>


<!-- Sharingbutton Line -->

<a aria-label='Line' class='resp-sharing-button__link' href='&quot;https://timeline.line.me/social-plugin/share?url=&quot; + data:post.canonicalUrl' rel='noopener' target='_blank' title='Share on Line'>
  <div class='resp-sharing-button resp-sharing-button--line'><div aria-hidden='true' class='resp-sharing-button__icon'>
  <svg viewBox='0 0 24 24'><path d='M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.63-.63h2.386c.346 0 .627.285.627.63 0 .349-.281.63-.63.63H17.61v1.125h1.755zm-3.855 3.016c0 .27-.174.51-.432.596-.064.021-.133.031-.199.031-.211 0-.391-.09-.51-.25l-2.443-3.317v2.94c0 .344-.279.629-.631.629-.346 0-.626-.285-.626-.629V8.108c0-.27.173-.51.43-.595.06-.023.136-.033.194-.033.195 0 .375.104.495.254l2.462 3.33V8.108c0-.345.282-.63.63-.63.345 0 .63.285.63.63v4.771zm-5.741 0c0 .344-.282.629-.631.629-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.63-.63.346 0 .628.285.628.63v4.771zm-2.466.629H4.917c-.345 0-.63-.285-.63-.629V8.108c0-.345.285-.63.63-.63.348 0 .63.285.63.63v4.141h1.756c.348 0 .629.283.629.63 0 .344-.282.629-.629.629M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314'/></svg></div><span>Line</span></div>
</a>


<!-- Sharingbutton Copy Link -->

<a aria-label='Copy Link' class='resp-sharing-button__link' href='&quot;https://cdn.staticaly.com/gh/KompiAjaib/kompi-html/master/copier_2.10.html#&quot; + data:post.canonicalUrl' rel='noopener' target='_blank' title='Share on Copy Link'>
  <div class='resp-sharing-button resp-sharing-button--linkbtn'><div aria-hidden='true' class='resp-sharing-button__icon'>
  <svg viewBox='0 0 24 24'><path d='M10.59,13.41C11,13.8 11,14.44 10.59,14.83C10.2,15.22 9.56,15.22 9.17,14.83C7.22,12.88 7.22,9.71 9.17,7.76V7.76L12.71,4.22C14.66,2.27 17.83,2.27 19.78,4.22C21.73,6.17 21.73,9.34 19.78,11.29L18.29,12.78C18.3,11.96 18.17,11.14 17.89,10.36L18.36,9.88C19.54,8.71 19.54,6.81 18.36,5.64C17.19,4.46 15.29,4.46 14.12,5.64L10.59,9.17C9.41,10.34 9.41,12.24 10.59,13.41M13.41,9.17C13.8,8.78 14.44,8.78 14.83,9.17C16.78,11.12 16.78,14.29 14.83,16.24V16.24L11.29,19.78C9.34,21.73 6.17,21.73 4.22,19.78C2.27,17.83 2.27,14.66 4.22,12.71L5.71,11.22C5.7,12.04 5.83,12.86 6.11,13.65L5.64,14.12C4.46,15.29 4.46,17.19 5.64,18.36C6.81,19.54 8.71,19.54 9.88,18.36L13.41,14.83C14.59,13.66 14.59,11.76 13.41,10.59C13,10.2 13,9.56 13.41,9.17Z'/></svg></div><span>Copy Link</span></div>
</a>


<div class="clear"></div>

</div>

</div>