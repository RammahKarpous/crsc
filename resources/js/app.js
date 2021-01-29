const isParticipating = document.querySelectorAll('.is-participating');
const laneNumbers = document.querySelectorAll('.lane-number');
const selectedLane = document.querySelectorAll('.selected-lane');

for(let i = 0; i < isParticipating.length; i++) {
    if (isParticipating[i].checked == true) {
        selectedLane[i].checked = true
    }

    isParticipating[i].addEventListener('change', () => {
        if (isParticipating[i].checked == true) {
            selectedLane[i].checked = true
        } else {
            selectedLane[i].checked = false
        }
    })
}

for(let i = 0; i < laneNumbers.length; i++) {
    selectedLane[i].value = laneNumbers[i].value

    laneNumbers[i].addEventListener('change', () => {
        selectedLane[i].value = laneNumbers[i].value
    })
}