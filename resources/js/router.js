import Contacts from './views/Contacts'

const contactAdminRoutes = [
    {
        name: 'admin-contacts',
        path: '/contacts',
        component: Contacts,
        meta: {
            adminRoute: true
        }
    },
]

export default contactAdminRoutes