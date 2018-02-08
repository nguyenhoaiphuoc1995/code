 function loai_bo_dau(nguon, dich)
    {
        var str = (document.getElementById(nguon).value);
        str= str.toLowerCase();
        str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
        str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
        str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
        str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
        str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
        str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
        str= str.replace(/đ/g,"d");
        str= str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g,"-");
        str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
        str= str.replace(/^\-+|\-+$/g,"");//cắt bỏ ký tự - ở đầu và cuối chuỗi
        var des = document.getElementById(dich);
        des.value = str;
    }
    function xacnhan()
	{
		return confirm('Bạn có muốn xóa dòng này không?');
	}
	function checkall(value)
	{
		$('input[name="check[]"').each(function(){if(value==true){$(this).attr('checked','true');}else{$(this).removeAttr('checked');} });
	}
	function openPopup()
	{
		var finder = new CKFinder();
		finder.selectActionFunction = SetFileField;
		finder.popup();
	}
	function openPopup3()
	{
		var finder = new CKFinder();
		finder.selectActionFunction = SetFileField3;
		finder.popup();
	}
	function openPopup2()
	{
		var win = window.open("http://chamsocthuonghieu.vn/finder.php","_blank","toolbar=yes, scrollbars=yes, resizable=yes, top=0, left=0, width=1000, height=600");
		win.focus();
	}
	function SetFileField( fileUrl )
	{
		$('input[id="hinh"]').val(fileUrl);
	}
	function SetFileField3( fileUrl )
	{
		$('input[id="hinh3"]').val(fileUrl);
	}
	function SetFileField2(id, fileUrl )
	{
		$('#'+id).val(fileUrl);
	}
	function openimg(field)
	{
		 CKFinder.popup( '../../', null, null, function(url) {sethinh( url,field)} ) ;
	}
	function sethinh(fileUrl,id )
	{
		$('#'+id).val(fileUrl);
		$('#'+id).parent().children('img').attr('src',fileUrl);
	}