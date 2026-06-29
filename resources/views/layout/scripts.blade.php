<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- apps -->
<script src="{{ asset('dist/js/app.min.js') }}"></script>
<script src="{{ asset('dist/js/app.init.horizontal.js') }}"></script>
<script src="{{ asset('dist/js/app-style-switcher.horizontal.js') }}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('assets/extra-libs/sparkline/sparkline.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('dist/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
<!--Custom JavaScript -->
<script src="{{ asset('dist/js/custom.min.js') }}"></script>
<script src="{{ asset('assets/extra-libs/horizontal-timeline/horizontal-timeline.js') }}"></script>
<script src="{{ asset('assets/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
<script src="{{ asset('assets/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<!--This page plugins -->
<script src="{{ asset('assets/extra-libs/DataTables/datatables.min.js') }}"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="{{ asset('dist/js/pages/datatable/datatable-advanced.init.js') }}"></script>
<!--This page JavaScript -->
<script src="{{ asset('assets/libs/chartist/dist/chartist.min.js') }}"></script>
<script src="{{ asset('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ asset('assets/libs/echarts/dist/echarts-en.min.js') }}"></script>
<script src="{{ asset('assets/libs/flot/excanvas.min.js') }}"></script>
<script src="{{ asset('assets/libs/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/libs/jquery.flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ asset('assets/extra-libs/c3/d3.min.js') }}"></script>
<script src="{{ asset('assets/extra-libs/c3/c3.min.js') }}"></script>
<script src="{{ asset('assets/libs/gaugeJS/dist/gauge.min.js') }}"></script>
<script src="{{ asset('dist/js/pages/widget/widget-charts.js') }}"></script>
<script src="{{ asset('assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/libs/magnific-popup/meg.init.js') }}"></script>
<!-- ============================================================== -->
<!--  authentication  js -->
<!-- ============================================================== -->
<script src="{{ asset('assets/js/authentication.js') }}"></script>
<!-- Forms js -->
<script src="{{ asset('assets/js/forms.js') }}"></script>
<!-- ============================================================== -->
<!--  chatbot  js -->
<!-- ============================================================== -->
<script src="{{ asset('assets/js/script_chat.js') }}"></script>
<!-- ============================================================== -->
<!-- This page plugin js -->
<!-- ============================================================== -->
<script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
</script>
<!-- ============================================================== -->
<!-- This scroll js -->
<!-- ============================================================== -->
<script>
    $('#slimtest1, #slimtest2, #slimtest3, #slimtest4').perfectScrollbar();
</script>
<!-- ============================================================== -->
<!-- cards Basic Draggable options  js -->
<!-- ============================================================== -->
<script>
    $(function() {
        dragula([document.getElementById("draggable-area")]),
            dragula([document.getElementById("card-colors")]).on("drag", function(e) {
                e.className = e.className.replace("card-moved", "")
            }).on("drop", function(e) {
                e.className += " card-moved"
            }).on("over", function(e, t) {
                t.className += " card-over"
            }).on("out", function(e, t) {
                t.className = t.className.replace("card-over", "")
            }), dragula([document.getElementById("copy-left"), document.getElementById("copy-right")], {
                copy: !0
            }), dragula([document.getElementById("left-handles"), document.getElementById("right-handles")], {
                moves: function(e, t, n) {
                    return n.classList.contains("handle")
                }
            }), dragula([document.getElementById("left-titleHandles"), document.getElementById(
                "right-titleHandles")], {
                moves: function(e, t, n) {
                    return n.classList.contains("titleArea")
                }
            })
    });
</script>
<script>
    // Dynamic Manipulation
    $("#example-manipulation").steps({
        headerTag: "h3",
        bodyTag: "section",
        enableAllSteps: true,
        enablePagination: false
    });
    var form = $(".validation-wizard").show();
    $(".validation-wizard").steps({
        headerTag: "h6",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: "Submit"
        },
        onStepChanging: function(event, currentIndex, newIndex) {
            return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (
                currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error")
                    .remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")),
                form
                .validate().settings.ignore = ":disabled,:hidden", form.valid())
        },
        onFinishing: function(event, currentIndex) {
            return form.validate().settings.ignore = ":disabled", form.valid()
        },
        onFinished: function(event, currentIndex) {
            swal("Form Submitted!",
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed."
            );
        }
    }), $(".validation-wizard").validate({
        ignore: "input[type=hidden]",
        errorClass: "text-danger",
        successClass: "text-success",
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass)
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass)
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element)
        },
        rules: {
            email: {
                email: !0
            }
        }
    })
</script>
