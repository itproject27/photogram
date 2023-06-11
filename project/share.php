<?php
$link = 'https://example.com';
$picture = 'https://example.com/image.jpg';
$name = 'عنوان المحتوى';
$caption = 'عنوان الصفحة';
$description = 'وصف المحتوى';

// إنشاء رابط المشاركة
$share_url = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($link) . '&picture=' . urlencode($picture) . '&title=' . urlencode($name) . '&caption=' . urlencode($caption) . '&description=' . urlencode($description);

// إنشاء رمز HTML لزر المشاركة
$share_button = '<a href="' . $share_url . '" target="_blank">مشاركة على Facebook</a>';

// عرض زر المشاركة
echo $share_button;
