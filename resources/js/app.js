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
    const house = document.getElementById('house'); // Added the house element

    if (!person || !percentage || !dashedLine || !house) {
        console.error('Person, percentage, dashed line, or house elements not found');
        return;
    }

    const personWidth = person.offsetWidth;
    const houseLeftPosition = house.getBoundingClientRect().left - dashedLine.getBoundingClientRect().left;

    const totalMove = houseLeftPosition - personWidth; //person should move to the edge of the house

    function movePerson() {
        let currentPosition = 0;
        const interval = setInterval(function() {
            if (currentPosition <= totalMove) {
                person.style.left = currentPosition + "px";

                // Update percentage position and value
                const percentComplete = Math.round((currentPosition / totalMove) * 100);
                percentage.innerText = percentComplete + "%"; // update the percentage value

                currentPosition += 5; // speed of movement
            } else {
                clearInterval(interval); // stop animation once it reaches the house
            }
        }, 50); // speed (lower value = faster movement)
    }

    movePerson();
}
