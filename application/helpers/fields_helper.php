<?php 
include("callFields.php");
$fieldSQL=$mysqli->query("select * from fields where kategori='$field_kategori' order by siralama");

while($field=$fieldSQL->fetch_assoc()){
if($field[kategori8]==0 and $field[kategori7]==$field_kategori7 and $field[kategori6]==$field_kategori6 and $field[kategori5]==$field_kategori5 and $field[kategori4]==$field_kategori4 and $field[kategori3]==$field_kategori3 and $field[kategori2]==$field_kategori2 and $field[kategori]==$field_kategori){
call_fields($field[Id],seo($field[name]),$field[name],$field[type],$field[field_values],$field[aralik],$field[multiple],$field[multiple_field_name],$field[multiple_field_seo_name],$field[required],$field[arama],$field[withfilter],$field[showlist],$fieldCallType);
}elseif($field[kategori7]==0 and $field[kategori6]==$field_kategori6 and $field[kategori5]==$field_kategori5 and $field[kategori4]==$field_kategori4 and $field[kategori3]==$field_kategori3 and $field[kategori2]==$field_kategori2 and $field[kategori]==$field_kategori){
call_fields($field[Id],seo($field[name]),$field[name],$field[type],$field[field_values],$field[aralik],$field[multiple],$field[multiple_field_name],$field[multiple_field_seo_name],$field[required],$field[arama],$field[withfilter],$field[showlist],$fieldCallType);
}elseif($field[kategori6]==0 and $field[kategori5]==$field_kategori5 and $field[kategori4]==$field_kategori4 and $field[kategori3]==$field_kategori3 and $field[kategori2]==$field_kategori2 and $field[kategori]==$field_kategori){
call_fields($field[Id],seo($field[name]),$field[name],$field[type],$field[field_values],$field[aralik],$field[multiple],$field[multiple_field_name],$field[multiple_field_seo_name],$field[required],$field[arama],$field[withfilter],$field[showlist],$fieldCallType);
}elseif($field[kategori5]==0 and $field[kategori4]==$field_kategori4 and $field[kategori3]==$field_kategori3 and $field[kategori2]==$field_kategori2 and $field[kategori]==$field_kategori){
call_fields($field[Id],seo($field[name]),$field[name],$field[type],$field[field_values],$field[aralik],$field[multiple],$field[multiple_field_name],$field[multiple_field_seo_name],$field[required],$field[arama],$field[withfilter],$field[showlist],$fieldCallType);
}elseif($field[kategori4]==0 and $field[kategori3]==$field_kategori3 and $field[kategori2]==$field_kategori2 and $field[kategori]==$field_kategori){
call_fields($field[Id],seo($field[name]),$field[name],$field[type],$field[field_values],$field[aralik],$field[multiple],$field[multiple_field_name],$field[multiple_field_seo_name],$field[required],$field[arama],$field[withfilter],$field[showlist],$fieldCallType);
}elseif($field[kategori3]==0 and $field[kategori2]==$field_kategori2 and $field[kategori]==$field_kategori){
call_fields($field[Id],seo($field[name]),$field[name],$field[type],$field[field_values],$field[aralik],$field[multiple],$field[multiple_field_name],$field[multiple_field_seo_name],$field[required],$field[arama],$field[withfilter],$field[showlist],$fieldCallType);
}elseif($field[kategori2]==0 and $field[kategori]==$field_kategori){
call_fields($field[Id],seo($field[name]),$field[name],$field[type],$field[field_values],$field[aralik],$field[multiple],$field[multiple_field_name],$field[multiple_field_seo_name],$field[required],$field[arama],$field[withfilter],$field[showlist],$fieldCallType);
}
}
?>
