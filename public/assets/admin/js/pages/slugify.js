function slugify(text) {
    return text
        .toString()
        .normalize("NFKD")
        .toLowerCase()
        .trim()
        .replace(/\s+/g, "-")
        .replace(/[^\w\-]+/g, "")
        .replace(/\-\-+/g, "-");
}

const nameInput = document.getElementById("textInput");
const slugOutput = document.getElementById("slugOutput");

nameInput.addEventListener("input", () => {
    const nameValue = nameInput.value;
    const slugValue = slugify(nameValue);
    slugOutput.value = slugValue;
});
