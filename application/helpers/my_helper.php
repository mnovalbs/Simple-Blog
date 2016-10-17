<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('includeTinyMCE'))
{
  function includeTinyMCE($source,$height=400){
    echo "<script src='".$source."'></script>";
    echo '<script>
    tinymce.init({
        selector: ".tinyMCE",
        height: '.$height.',

        plugins: [
          "advlist autolink lists link print preview anchor",
          "searchreplace visualblocks fullscreen",
          "insertdatetime media table contextmenu paste image jbimages code"
        ],

        toolbar: "styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages | code",

        image_caption: true,
        relative_urls: false,

        setup : function(ed){
          ed.on("change",function(e){tinyMCE.triggerSave();$("#unsave-form").trigger("checkform.areYouSure");});
          ed.on("keyup",function(e){tinyMCE.triggerSave();$("#unsave-form").trigger("checkform.areYouSure");});
        }
     });
    </script>';
  }
}

if(!function_exists('intToStr'))
{
  function intToStr($num)
  {
    $num = (int)$num;
    if(strlen($num)==1){$num = "0".$num;}
    return $num;
  }
}

if(!function_exists('informasi'))
{
  function informasi($danger,$text)
  {
    return '<div class="alert alert-'.$danger.'" role="alert">'.$text.'</div>';
  }
}

if(!function_exists('safe_echo_html'))
{
  function safe_echo_html($string)
  {
    return trim(strip_tags(htmlspecialchars($string, ENT_QUOTES)));
  }
}

if(!function_exists('safe_echo_input'))
{
  function safe_echo_input($string)
  {
    return trim(preg_replace('/\s+/',' ', htmlspecialchars($string, ENT_QUOTES)));
  }
}

if(!function_exists('bulan'))
{
  function bulan($num){
    switch($num){
      case 1 : {
        return 'Januari';
        break;
      }
      case 2 : {
        return 'Februari';
        break;
      }
      case 3 : {
        return 'Maret';
        break;
      }
      case 4 : {
        return 'April';
        break;
      }
      case 5 : {
        return 'Mei';
        break;
      }
      case 6 : {
        return 'Juni';
        break;
      }
      case 7 : {
        return 'Juli';
        break;
      }
      case 8 : {
        return 'Agustus';
        break;
      }
      case 9 : {
        return 'September';
        break;
      }
      case 10 : {
        return 'Oktober';
        break;
      }
      case 11 : {
        return 'November';
        break;
      }
      case 12 : {
        return 'Desember';
        break;
      }
    }
  }
}

if(!function_exists('get_client_ip'))
{
  function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = '127.0.0.1';
    return $ipaddress;
  }
}

if( !function_exists('slug') )
{
  function slug($string){
      return strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-'));
  }
}
