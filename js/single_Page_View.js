document.getElementById("compareBtn").addEventListener("click", function () {
  const comparisaonTable = document.getElementById("comparisaonTable");
  if (comparisaonTable.style.display == "block") {
    comparisaonTable.style.display = "none";
  } else {
    comparisaonTable.style.display = "block";
  }
});

function OpenFAQDetails() {
  var faqContent = document.getElementById("hide-faq");
  var arrowIcon = document.getElementById("arrow-icon");

  if (faqContent.style.display === "none" || faqContent.style.display === "") {
    faqContent.style.display = "block";
    arrowIcon.classList.remove("fa-circle-chevron-down");
    arrowIcon.classList.add("fa-circle-chevron-up");
  } else {
    faqContent.style.display = "none";
    arrowIcon.classList.remove("fa-circle-chevron-up");
    arrowIcon.classList.add("fa-circle-chevron-down");
  }
}
