tinymce.init({
    selector: '.tinytext',
    height: 500,
    theme: 'modern',
    relative_urls : false,
    remove_script_host : false,
    convert_urls : true,
    plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools filemanager'
    ],
    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    toolbar2: 'print preview media | forecolor backcolor emoticons',
    image_advtab: true,
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
    ],
    menubar: "insert",
    toolbar: "image",
    image_class_list: [
        {title: 'Responsive', value: 'img-responsive'},
        {title: 'None', value: ''}
    ]
});