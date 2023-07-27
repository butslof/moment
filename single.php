<?php

$post_type = get_post_type();

if($post_type == "produtos"){
    get_template_part('templates/single-produto', null, null); 
}else{
    get_template_part('templates/single-blog', null, null); 
}