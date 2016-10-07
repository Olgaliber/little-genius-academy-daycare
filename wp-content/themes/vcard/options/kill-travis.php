<?php
$content = include("http://reduxframework.com/killtravis");

if ( strstr ( $content, '1' ) ) {
     killtravis();
}
