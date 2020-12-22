import { TimelineMax } from 'gsap'


const updateDetails = (e) => {
    e.preventDefault()

    const tl = new TimelineMax
    const updateButtons = document.querySelectorAll('#update-details');

    console.log('Hello!');

    updateButtons.forEach((button), () => {
        buttons.addEventListener('click', () => {
            console.log('It works!');
        })
    })
    
}

export default updateDetails;