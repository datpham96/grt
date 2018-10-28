// Load avatar khong duoc xoa
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(140)
                .height(150);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function () {
	var height = $('.cat-admin').height();
	$('#mainnav').css("padding-top",height);
});
