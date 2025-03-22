<script setup>
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();
const userRoles = computed(() => page.props.auth?.user?.roles || []);
const userPermissions = computed(() => page.props.auth?.user?.permissions || []);

// Function to check if the user has a specific role
const hasRole = (role) => userRoles.value.includes(role);

// Define menu items with Spatie permissions
const menuItems = computed(() => {
    const menus = [];
    const addedMenus = new Set(); // Prevents duplicate entries

    const addMenuItem = (label, url, permission, dropdown) => {
        if (!addedMenus.has(label) && (hasRole("admin") || hasRole("manager") || hasPermission(permission))) {
            menus.push({ label, url, dropdown });
            addedMenus.add(label);
        }
    };

    // Define dropdowns globally to avoid repetition
    const dropdowns = {
        clients: [
            { label: "➕ Add Client", url: "/admin/clients/create" },
            { label: "📄 View Clients", url: "/admin/clients" },
            { label: "✏️ Edit Clients", url: "/admin/clients/edit" },
            { label: "🗑 Delete Clients", url: "/admin/clients/delete" }
        ],
        receptionists: [
            { label: "➕ Add Receptionist", url: "/admin/receptionists/create" },
            { label: "📄 View Receptionists", url: "/admin/receptionists" },
            { label: "✏️ Edit Receptionists", url: "/admin/receptionists/edit" },
            { label: "🗑 Delete Receptionists", url: "/admin/receptionists/delete" }
        ],
        managers: [
            { label: "➕ Add Manager", url: "/admin/managers/create" },
            { label: "📄 View Managers", url: "/admin/managers" },
            { label: "✏️ Edit Managers", url: "/admin/managers/edit" },
            { label: "🗑 Delete Managers", url: "/admin/managers/delete" }
        ],
        floors: [
            { label: "➕ Add Floor", url: "/admin/floors/create" },
            { label: "📄 View Floors", url: "/admin/floors" },
            { label: "✏️ Edit Floors", url: "/admin/floors/edit" },
            { label: "🗑 Delete Floors", url: "/admin/floors/delete" }
        ],
        rooms: [
            { label: "➕ Add Room", url: "/admin/rooms/create" },
            { label: "📄 View Rooms", url: "/admin/rooms" },
            { label: "✏️ Edit Rooms", url: "/admin/rooms/edit" },
            { label: "🗑 Delete Rooms", url: "/admin/rooms/delete" }
        ]
    };

    // Assign menu items based on roles
    if (hasRole("admin")) {
        addMenuItem("👤 Manage Managers", "/admin/managers", "manage managers", dropdowns.managers);
        addMenuItem("📋 Manage Receptionists", "/admin/receptionists", "manage receptionists", dropdowns.receptionists);
        addMenuItem("👥 Manage Clients", "/admin/clients", "manage clients", dropdowns.clients);
        addMenuItem("🏢 Manage Floors", "/admin/floors", "manage floors", dropdowns.floors);
        addMenuItem("🚪 Manage Rooms", "/admin/rooms", "manage rooms", dropdowns.rooms);
    }

    // if (hasRole("manager")) {
    //     addMenuItem("📋 Manage Receptionists", "/admin/receptionists", "manage receptionists", dropdowns.receptionists);
    //     addMenuItem("👥 Manage Clients", "/admin/clients", "manage clients", dropdowns.clients);
    //     addMenuItem("🏢 Manage Floors", "/admin/floors", "manage floors", dropdowns.floors);
    //     addMenuItem("🚪 Manage Rooms", "/admin/rooms", "manage rooms", dropdowns.rooms);
    // }

    // if (hasRole("receptionist")) {
    //     addMenuItem("👥 Manage Clients", "/admin/clients", "manage clients", dropdowns.clients.filter(item => item.label === "📄 View Clients"));
    // }

    return menus;
});
</script>

<template>
    <nav v-if="menuItems.length > 0">
        <ul class="sidebar">
            <li v-for="item in menuItems" :key="item.label">
                <span class="menu-title">{{ item.label }}</span>
                <ul class="dropdown">
                    <li v-for="subItem in item.dropdown" :key="subItem.url">
                        <a :href="subItem.url">{{ subItem.label }}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</template>

<style scoped>
.sidebar {
    background-color: #2c3e50;
    padding: 10px;
    width: 250px;
    color: white;
}

.menu-title {
    display: block;
    padding: 10px;
    font-size: 16px;
    font-weight: bold;
    background: #34495e;
}

.dropdown {
    list-style-type: none;
    padding-left: 15px;
    margin-top: 5px;
    display: block; /* Always visible */
}

.dropdown li a {
    display: block;
    padding: 5px 10px;
    color: white;
    text-decoration: none;
}

.dropdown li a:hover {
    background: #1abc9c;
}
</style>
