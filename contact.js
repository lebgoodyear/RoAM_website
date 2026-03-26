// CONTACT FORM

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("submitBtn").addEventListener("click", sendContact);
})

function sendContact() {
    const name = document.getElementById("contactName").value.trim();
    const email = document.getElementById("contactEmail").value.trim();
    const message = document.getElementById("contactMessage").value.trim();

    if (!name || !email || !message) {
        alert("Please fill in all fields.");
        return;
    }

    const formData = new FormData();
    formData.append("contactName", name);
    formData.append("contactEmail", email);
    formData.append("contactMessage", message);

    fetch("contact_back.php", {
        method: "POST",
        body: formData    
    })
    .then(response => response.text().then(text => ({ ok: response.ok, text })))
    .then(({ok, text}) => {
        if(ok) {
            alert("Message sent! I'll get back to you soon.");
            document.getElementById("contactForm").reset();
        } else {
            alert("Error: " + text);
        }
    })
    .catch(() => {
        alert("Something went wrong. Please try again.");
    });
}
