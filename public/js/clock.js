function updateClock() {
    const now = new Date();

    const hours = now.getHours();
    const minutes = now.getMinutes();
    const seconds = now.getSeconds();

    document.getElementById('hour').innerText = hours < 10 ? `0${hours}` : hours;
    document.getElementById('minute').innerText = minutes < 10 ? `0${minutes}` : minutes;
    document.getElementById('second').innerText = seconds < 10 ? `0${seconds}` : seconds;
}

// Update the clock every second
setInterval(updateClock, 1000);

// Initial update
updateClock();
