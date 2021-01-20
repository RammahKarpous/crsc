import barba from '@barba/core';
import { TimelineMax } from 'gsap';

const animationEnter = (container) => {
    const tl = new TimelineMax();

    tl.from(container, {opacity: 0, duration: 2})
}

const animationLeave = (container) => {
    const tl = new TimelineMax();
    const heading = container.querySelector('h1');

    tl.to(heading, {x: 200, duration: 7})
}

barba.init({
    transitions: [
        {
            once({next}) {
                animationEnter(next.container)
            },

            leave: ({current}) => animationLeave(current.container),

            enter({next}) {
                animationEnter(next.container)
            }
        }
    ]
})