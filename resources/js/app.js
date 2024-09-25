import './bootstrap';

document.getElementById('upload-form').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission

    const form = document.getElementById('upload-form');
    const formData = new FormData(form);

    const fileInput = document.getElementById('cv-upload');
    const file = fileInput.files[0];
    const allowedTypes = ['application/pdf', 'image/jpeg', 'image/png', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];

    if (file && !allowedTypes.includes(file.type)) {
        alert('Nesprávny typ súboru. Nahraj PDF, JPG, PNG, alebo DOC.');
        return;
    }

    // Switch to the loading screen
    document.getElementById('section3').classList.add('hidden');
    document.getElementById('loading-screen').classList.remove('hidden');

    fetch('/upload-cv', {
        method: 'POST',
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                setTimeout(function() {
                    document.getElementById('loading-screen').classList.add('hidden');
                    document.getElementById('success-screen').classList.remove('hidden');
                    initializePersonMovement();
                }, 10000);
            } else {
                // Show the form screen again
                document.getElementById('loading-screen').classList.add('hidden');
                document.getElementById('upload-form').classList.remove('hidden');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('loading-screen').classList.add('hidden');
            document.getElementById('upload-form').classList.remove('hidden');
        });
});

function initializePersonMovement() {
    const person = document.getElementById('person');
    const percentage = document.getElementById('percentage');
    const dashedLine = document.querySelector('.border-dashed');

    if (!person || !percentage || !dashedLine) {
        console.error('Person, percentage, or dashed line elements not found');
        return;
    }

    const lineWidth = dashedLine.offsetWidth;
    const personWidth = person.offsetWidth;

    const totalMove = lineWidth - personWidth;

    function movePerson() {
        let currentPosition = 0;
        const interval = setInterval(function() {
            if (currentPosition <= totalMove) {
                person.style.left = currentPosition + "px";

                const percentComplete = Math.round((currentPosition / totalMove) * 100);
                percentage.style.left = currentPosition + "px"; // Adjust percentage position
                percentage.innerText = percentComplete + "%"; // Update the percentage value

                currentPosition += 5; // Adjust the speed of movement (increase or decrease)
            } else {
                clearInterval(interval);
            }
        }, 50); // Adjust the speed (lower value = faster movement)
    }

    // Start the person movement
    movePerson();
}
