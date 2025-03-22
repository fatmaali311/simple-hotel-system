<script setup lang="ts">
import { SidebarGroup, SidebarGroupLabel, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { Link, usePage } from '@inertiajs/vue3';

// Define types for user and props
interface User {
    id: number;
    permissions: string[];
}

interface PageProps {
    auth?: {
        user?: User;
    };
}

// Define the full type of `usePage()`
interface Page {
    props: PageProps;
    url: string;
}

// Explicitly type `usePage()`
const page = usePage() as Page;

// Extract user permissions safely
const userPermissions = page.props.auth?.user?.permissions || [];

// Define menu items with required permissions
const menuItems = [
    { label: '🏠 Dashboard', url: '/admin/dashboard', permission: 'view dashboard' },
    { label: '👤 Manage Managers', url: '/admin/managers', permission: 'manage managers' },
    { label: '📋 Manage Receptionists', url: '/admin/receptionists', permission: 'manage receptionists' },
    { label: '👥 Manage Clients', url: '/admin/clients', permission: 'manage clients' },
    { label: '🏢 Manage Floors', url: '/admin/floors', permission: 'manage floors' },
    { label: '🚪 Manage Rooms', url: '/admin/rooms', permission: 'manage rooms' },
    { label: '📊 View Statistics', url: '/admin/statistics', permission: 'view statistics' },
];
console.log("User object:", page.props.auth?.user);

console.log("User Permissions from Laravel:", userPermissions);

// Filter menu items based on user permissions
const filteredMenuItems = menuItems.filter(item => userPermissions.includes(item.permission));
</script>

<template>
    <SidebarGroup class="px-2 py-0">
        <SidebarGroupLabel>Admin Panel</SidebarGroupLabel>
        <SidebarMenu>
            <SidebarMenuItem v-for="item in filteredMenuItems" :key="item.url">
                <SidebarMenuButton as-child :is-active="page.url.startsWith(item.url)">
                    <Link :href="item.url">
                        <span>{{ item.label }}</span>
                    </Link>
                </SidebarMenuButton>
            </SidebarMenuItem>
        </SidebarMenu>
    </SidebarGroup>
</template>
