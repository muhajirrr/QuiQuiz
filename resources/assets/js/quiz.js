$(function () {
    function showSlide(n) {
        if (n > slides.length || n < 0) return;
        $(slides[currentSlide]).hide(400, function () {
            $(slides[n]).show(400);
        });
        currentSlide = n;

        if (currentSlide === 0) {
            previousButton.style.display = "none";
        } else {
            previousButton.style.display = "inline-block";
        }

        if (currentSlide === slides.length - 1) {
            nextButton.style.display = "none";
            submitButton.style.display = "inline-block";
        } else {
            nextButton.style.display = "inline-block";
            submitButton.style.display = "none";
        }
    }

    function showNextSlide() {
        showSlide(currentSlide + 1);
    }

    function showPreviousSlide() {
        showSlide(currentSlide - 1);
    }

    const submitButton = document.getElementById("submit");

    const previousButton = document.getElementById("previous");
    const nextButton = document.getElementById("next");
    const slides = $('.slide').toArray();
    let currentSlide = 0;

    previousButton.addEventListener("click", showPreviousSlide);
    nextButton.addEventListener("click", showNextSlide);

    $('#btnname').click(function () {
        if ($('#inputname').val() != '') {

            if (slides.length == 0) {
                alert('No question in this quiz.');
                return;
            }

            $('#nameform').val($('#inputname').val());
            $('#slidename').hide(400, function () {
                showSlide(0)
            });
        } else {
            alert('Name cannot be empty!');
        }
    });
});