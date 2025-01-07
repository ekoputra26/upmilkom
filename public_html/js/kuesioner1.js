$(document).ready(function () {
    let adaNimMK = false;
    $("#peringatan").hide();
    $("#peringatanNIM").hide();
    $("#peringatanMK").hide();
    $("#namaMKInput").select2({
        theme: "bootstrap-5",
    });
    $("#dosenInput1").select2({
        theme: "bootstrap-5",
    });
    $("#dosenInput2").select2({
        theme: "bootstrap-5",
    });

    const home = document.getElementById("home");
    const bagian1 = document.getElementById("bagian1");
    const bagian2 = document.getElementById("bagian2");
    const bagian3 = document.getElementById("bagian3");
    const bagian4 = document.getElementById("bagian4");
    const bagian5 = document.getElementById("bagian5");
    $("#hr2").hide();
    $("#hr3").hide();
    $("#hr4").hide();
    $("#hr5").hide();
    $("#peringatan").hide();
    $("#peringatanNIM").hide();
    $("#peringatanMK").hide();
    $("#kelasInput option").hide();

    function setBagian1() {
        $("#hr1").show();
        $("#peringatan").hide();
        $("#peringatanNIM").hide();
        $("#peringatanMK").hide();
        $("#hr2").hide();
        $("#hr3").hide();
        $("#hr4").hide();
        $("#hr5").hide();
        $(".bagian1_nav").css("color", "#028391");
        $(".bagian2_nav").css("color", "black");
        $(".bagian3_nav").css("color", "black");
        $(".bagian4_nav").css("color", "black");
        $(".bagian5_nav").css("color", "black");
    }

    function setBagian2() {
        $("#hr1").hide();
        $("#hr2").show();
        $("#hr3").hide();
        $("#hr4").hide();
        $("#hr5").hide();
        $(".bagian1_nav").css("color", "black");
        $(".bagian2_nav").css("color", "#028391");
        $(".bagian3_nav").css("color", "black");
        $(".bagian4_nav").css("color", "black");
        $(".bagian5_nav").css("color", "black");
    }

    function setBagian3() {
        $("#hr1").hide();
        $("#hr2").hide();
        $("#hr3").show();
        $("#hr4").hide();
        $("#hr5").hide();
        $(".bagian1_nav").css("color", "black");
        $(".bagian2_nav").css("color", "black");
        $(".bagian3_nav").css("color", "#028391");
        $(".bagian4_nav").css("color", "black");
        $(".bagian5_nav").css("color", "black");
    }

    function setBagian4() {
        $("#hr1").hide();
        $("#hr2").hide();
        $("#hr3").hide();
        $("#hr4").show();
        $("#hr5").hide();
        $(".bagian1_nav").css("color", "black");
        $(".bagian2_nav").css("color", "black");
        $(".bagian3_nav").css("color", "black");
        $(".bagian4_nav").css("color", "#028391");
        $(".bagian5_nav").css("color", "black");
    }

    function setBagian5() {
        $("#hr1").hide();
        $("#hr2").hide();
        $("#hr3").hide();
        $("#hr4").hide();
        $("#hr5").show();
        $(".bagian1_nav").css("color", "black");
        $(".bagian2_nav").css("color", "black");
        $(".bagian3_nav").css("color", "black");
        $(".bagian4_nav").css("color", "black");
        $(".bagian5_nav").css("color", "#028391");
    }

    $("#form_navigation").hide();
    $(".bagian1").hide();
    $(".bagian2").hide();
    $(".bagian3").hide();
    $(".bagian4").hide();
    $(".bagian5").hide();
    $("#peringatan").hide();
    $("#peringatanNIM").hide();
    $("#peringatanMK").hide();
    $(".bagian6").hide();
    $(".bagian1_nav").click(function () {
        setBagian1();
        $(".bagian1").show();
        $(".bagian2").hide();
        $(".bagian3").hide();
        $(".bagian4").hide();
        $(".bagian5").hide();
    });
    $(".bagian2_nav").click(function () {
        setBagian2();
        $(".bagian1").hide();
        $(".bagian2").show();
        $(".bagian3").hide();
        $(".bagian4").hide();
        $(".bagian5").hide();
    });
    $(".bagian3_nav").click(function () {
        setBagian3();
        $(".bagian1").hide();
        $(".bagian2").hide();
        $(".bagian3").show();
        $(".bagian4").hide();
        $(".bagian5").hide();
    });
    $(".bagian4_nav").click(function () {
        setBagian4();
        $(".bagian1").hide();
        $(".bagian2").hide();
        $(".bagian3").hide();
        $(".bagian4").show();
        $(".bagian5").hide();
    });
    $(".bagian5_nav").click(function () {
        setBagian5();
        $(".bagian1").hide();
        $(".bagian2").hide();
        $(".bagian3").hide();
        $(".bagian4").hide();
        $(".bagian5").show();
    });
    $("#selanjutnya1").click(function () {
        if (
            $("#programStudiInput").val() == "Pilih program studi" ||
            $("#semesterInput").val() == "Pilih semester" ||
            $("#nimInput").val() == null ||
            $("#kelasInput").val() == "Pilih kelas" ||
            $("#hariInput").val() == "Pilih hari perkuliahan" ||
            $("#namaMKInput").val() == "Pilih nama mata kuliah" ||
            $("#jenisMKInput").val() == "Pilih jenis mata kuliah" ||
            $("#dosenInput1").val() == "Pilih nama dosen" ||
            $("#dosenInput2").val() == "Pilih nama dosen" ||
            $("#ruanganInput").val() == "Pilih nama ruangan"
        ) {
            $("#peringatan").show();
        } else {
            if (!$("#nimInput").val().startsWith("09")) {
                $("#peringatanNIM").show();
            } else {
                if (adaNimMK) {
                    $("#peringatanMK").show();
                } else {
                    $("#peringatan").hide();
                    $("#peringatanMK").hide();
                    $("#peringatanNIM").hide();
                    $("#form_navigation").show();
                    setBagian1();
                    $(".home").hide();
                    $("#selanjutnya1").addClass("d-none");
                    $(".bagian1").show();
                    bagian1.scrollIntoView();
                }
            }
        }
    });
    $("#sebelumnya1").click(function () {
        $("#peringatan").hide();
        $("#peringatanNIM").hide();
        $("#peringatanMK").hide();
        $("#form_navigation").hide();
        $(".home").show();
        $("#selanjutnya1").removeClass("d-none");
        $(".bagian1").hide();
        home.scrollIntoView();
    });
    $("#selanjutnya2").click(function () {
        setBagian2();
        $(".bagian1").hide();
        $(".bagian2").show();
        bagian2.scrollIntoView();
    });
    $("#sebelumnya2").click(function () {
        setBagian1();
        $(".bagian1").show();
        $(".bagian2").hide();
        bagian1.scrollIntoView();
    });
    $("#selanjutnya3").click(function () {
        setBagian3();
        $(".bagian2").hide();
        $(".bagian3").show();
        bagian3.scrollIntoView();
    });
    $("#sebelumnya3").click(function () {
        setBagian2();
        $(".bagian2").show();
        $(".bagian3").hide();
        bagian2.scrollIntoView();
    });
    $("#selanjutnya4").click(function () {
        setBagian4();
        $(".bagian3").hide();
        $(".bagian4").show();
        bagian4.scrollIntoView();
    });
    $("#sebelumnya4").click(function () {
        setBagian3();
        $(".bagian3").show();
        $(".bagian4").hide();
        bagian3.scrollIntoView();
    });
    $("#selanjutnya5").click(function () {
        setBagian5();
        $(".bagian4").hide();
        $(".bagian5").show();
        bagian5.scrollIntoView();
    });
    $("#sebelumnya5").click(function () {
        setBagian4();
        $(".bagian4").show();
        $(".bagian5").hide();
        bagian4.scrollIntoView();
    });
    $("#selanjutnya6").click(function () {
        $("#form_navigation").hide();
        $(".bagian5").hide();
        $("#home").show();
        $(".bagian6").show();
        home.scrollIntoView();
    });
    $("#sebelumnya6").click(function () {
        setBagian5();
        $("#form_navigation").show();
        $(".bagian5").show();
        $(".bagian6").hide();
        $("#home").hide();
        bagian5.scrollIntoView();
    });

    $("#b21").change(function () {
        for (let i = 0; i <= 16; i++) {
            $("#b22 .val" + i).prop("disabled", false);
            $("#b23 .val" + i).prop("disabled", false);
        }

        var pilihan = $("#b21").val();

        for (let i = 16; i > pilihan; i--) {
            $("#b22 .val" + i).prop("disabled", true);
            $("#b23 .val" + i).prop("disabled", true);
        }
    });

    $("#b22").change(function () {
        if ($("#b21").val() >= 1) {
            for (let i = 0; i <= 16; i++) {
                $("#b23 .val" + i).prop("disabled", false);
            }

            var xx = $("#b22").val();
            var pilihan = $("#b21").val() - xx;

            for (let i = 16; i > pilihan; i--) {
                $("#b23 .val" + i).prop("disabled", true);
            }
        } else {
            for (let i = 0; i <= 16; i++) {
                $("#b23 .val" + i).prop("disabled", false);
            }

            var xx = $("#b22").val();
            var pilihan = 16 - xx;

            for (let i = 16; i > pilihan; i--) {
                $("#b23 .val" + i).prop("disabled", true);
            }
        }
    });

    $("#programStudiInput").on("input", function () {
        let jurusan = $(this).val();
        $("#kelasInput option").hide();
        $("#kelasInput option[jurusan='" + jurusan + "']").show();
    });

    $("#nimInput").on("input", function (e) {
        $.ajax({
            url: "/api/nim-mk",
            type: "GET",
            dataType: "json",
            success: function (response) {
                adaNimMK = false;
                for (let i = 0; i < response.length; i++) {
                    if (
                        $("#nimInput").val() == response[i].nim &&
                        $("#namaMKInput").val() == response[i].nama_mk
                    ) {
                        adaNimMK = true;
                    }
                }
            },
        });
    });

    $("#namaMKInput").on("input", function (e) {
        $.ajax({
            url: "/api/nim-mk",
            type: "GET",
            dataType: "json",
            success: function (response) {
                adaNimMK = false;
                for (let i = 0; i < response.length; i++) {
                    if (
                        $("#nimInput").val() == response[i].nim &&
                        $("#namaMKInput").val() == response[i].nama_mk
                    ) {
                        adaNimMK = true;
                    }
                }
            },
        });
    });
});
