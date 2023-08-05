/// print pdf
function myPrint() {
    var element = document.getElementById('printdata');
    html2pdf(element);
}
$('img[data-enlargable]').addClass('img-enlargable').click(function () {
    var src = $(this).attr('src');
    $('<div>').css({
        background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
        backgroundSize: 'contain',
        width: '100%',
        height: '100%',
        position: 'fixed',
        zIndex: '10000',
        top: '0',
        left: '0',
        cursor: 'zoom-out'
    }).click(function () {
        $(this).remove();
    }).appendTo('body');
});

// show degree field
$('.adddegbtn').on("click", function () {
    if ($('.degreefield').hasClass("d-none")) {
        $('.degreefield').removeClass("d-none");
        $('.degreefield').addClass("row");

    } else {
        $('.degreefield').removeClass("row");
        $('.degreefield').addClass("d-none");
    }
})
$(document).ready(function () {
    // show login form
    $(".lbtn").on("click", function () {
        if ($('#lform').hasClass("d-none")) {
            $('#lform').removeClass("d-none")
            $('#rform').addClass("d-none")
        }
    })
    // show sign up fomr
    $(".rbtn").on("click", function () {
        if ($('#rform').hasClass("d-none")) {
            $('#lform').addClass("d-none")
            $('#rform').removeClass("d-none")
        }
    })
    // get prefered doctor
    $('#department').on("change", function (e) {
        var val = e.target.value;
        $.ajax({
            url:'/hospital/getpdoc/'+val,
            type:"get",
            success:function(d){
                $('#pdoctor').html(d);
            }

        })

    })
    // get prefered doctor
     $('#department').on("change",function(e){
        var val=e.target.value;
        $.ajax({
            url:'/hospital/gettype/'+val,
            type:"get",
            success:function(d){
                $('#artype').html(d);
            }

        })
    })

        // get prefered doctor
        $('#rfdep').on("change",function(e){
            var val=e.target.value;
            $.ajax({
                url:'/doctor/gettype/'+val,
                type:"get",
                success:function(d){
                    $('#rftype').html(d);
                }
    
            })
        })
    // get delete model 
    $('.RpDeleteBtn').on("click",function(e){
        var val=$(this).data('attr');
        $.ajax({
            url:'/hospital/deleteModel/'+val,
            type:"get",
            success:function(d){
                $('.delete_model_body').html(d);
            }

        })
    })
    // for mat cnange
    $('.prepare_title').on("change",function(e){
        var val=e.target.value;
        $.ajax({
                url:'/doctor/cnage_format/'+val,
                type:"get",
                success:function(d){
                    $('.reDeatils').html(d);
                }
    
            })
    })
});
