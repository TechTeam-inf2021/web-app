function sendSimplepushNotification(key, title, message) {
    fetch('https://api.simplepush.io/send', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            key: key,
            title: title,
            msg: message
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "OK") {
            console.log("Notification sent successfully");
        } else {
            console.error("Failed to send notification", data);
        }
    })
    .catch(error => {
        console.error("Error sending notification", error);
    });
}