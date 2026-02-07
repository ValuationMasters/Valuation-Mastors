document.getElementById("contactForm").addEventListener("submit", function(e) {
  e.preventDefault();

  const status = document.getElementById("formStatus");
  const formData = new FormData(this);

  // Simple validation
  for (let value of formData.values()) {
    if (!value.trim()) {
      status.style.color = "red";
      status.textContent = "Please fill all fields.";
      return;
    }
  }

  fetch("send-mail.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.text())
  .then(data => {
    if (data === "success") {
      status.style.color = "green";
      status.textContent = "Message sent successfully!";
      document.getElementById("contactForm").reset();
    } else {
      status.style.color = "red";
      status.textContent = "Failed to send message.";
    }
  })
  .catch(() => {
    status.style.color = "red";
    status.textContent = "Server error. Try again later.";
  });
});