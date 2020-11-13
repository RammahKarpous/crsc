
let populateFormData = () => {
    const populateFam = document.querySelector('#populate');

    // family form elements
    const 
        familyName = document.querySelector('#family_name'),
        addressLine = document.querySelector('#address_line'),
        livingPlace = document.querySelector('#place'),
        postcode = document.querySelector('#postcode'),
        contactNumber = document.querySelector('#contact_number'),
        email = document.querySelector('#email')

    populateFam.addEventListener('click', () => {
        let data = familyData[Math.floor(Math.random() * familyData.length)]

        familyName.value = data['familyName']
        addressLine.value = data['addressLine']
        livingPlace.value = data['livingPlace']
        postcode.value = data['postcode']
        contactNumber.value = data['contactNumber']
        email.value = data['email']
    })

    let familyData = [
        { familyName: 'Karpous', addressLine: '47 Fernley Road', city: 'Birmingham', postcode: 'B11 3NS', contactNumber: '07 123 456 789', email: 'rammahkarpous@outlook.com' },
        { familyName: 'Johnson', addressLine: '47 Berry Street', city: 'Solihull', postcode: 'B11 3NS', contactNumber: '07 123 456 789', email: 'thejognsons@outlook.com' },
        { familyName: 'Jackie', addressLine: '51 Solihull Road', city: 'Stoke-On-Trent', postcode: 'ST24 3NS', contactNumber: '07 234 456 789', email: 'jackiechan@outlook.com' }
    ]

    let memberData = [
        {name: 'Rammah'}
    ]
}

export default populateFormData;