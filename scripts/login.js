/**测试测试
**/
/**
 *descript:点击图片刷新验证码
 */
function changeImage() {
	var img = document.getElementById("imgNumber");
	img.src=img.src+'?';
}