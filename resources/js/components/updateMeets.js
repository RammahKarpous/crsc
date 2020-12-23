import { TimelineMax} from 'gsap'

const updateMeets = () => {
    const tl = new TimelineMax();
    const meetForm = document.querySelector('.meets--meet-info .form');
    const updateButton = document.querySelector('#update-meet');
    tl
        .from(form, {duration: .3, y: -70, opacity: 0})

    tl.reverse()

    updateButton.addEventListener('click', (e) => {
        e.preventDefault();

        tl.reversed ? tl.play() : tl.reverse()
    })

}

export default updateMeets;