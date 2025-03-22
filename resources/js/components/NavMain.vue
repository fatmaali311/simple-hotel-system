<script setup lang="ts">
import { SidebarGroup, SidebarGroupLabel, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { Link, usePage } from '@inertiajs/vue3';

const page = usePage();
</script>

<template>
    <SidebarGroup class="px-2 py-0">
        <SidebarGroupLabel>Admin Panel</SidebarGroupLabel>
        <SidebarMenu>
            <!-- Dashboard -->
            <SidebarMenuItem>
                <SidebarMenuButton as-child :is-active="page.url === '/admin/dashboard'">
                    <Link href="/admin/dashboard">
                        <span>🏠 Dashboard</span>
                    </Link>
                </SidebarMenuButton>
            </SidebarMenuItem>

            <!-- Manage Managers -->
            <SidebarMenuItem>
                <SidebarMenuButton as-child :is-active="page.url.startsWith('/admin/managers')">
                    <Link href="/admin/managers">
                        <span>👤 Manage Managers</span>
                    </Link>
                </SidebarMenuButton>
            </SidebarMenuItem>

            <!-- Manage Receptionists -->
            <SidebarMenuItem>
                <SidebarMenuButton as-child :is-active="page.url.startsWith('/admin/receptionists')">
                    <Link href="/admin/receptionists">
                        <span>📋 Manage Receptionists</span>
                    </Link>
                </SidebarMenuButton>
            </SidebarMenuItem>

            <!-- Manage Clients -->
            <SidebarMenuItem>
                <SidebarMenuButton as-child :is-active="page.url.startsWith('/admin/clients')">
                    <Link href="/admin/clients">
                        <span>👥 Manage Clients</span>
                    </Link>
                </SidebarMenuButton>
            </SidebarMenuItem>

            <!-- Manage Floors -->
            <SidebarMenuItem>
                <SidebarMenuButton as-child :is-active="page.url.startsWith('/admin/floors')">
                    <Link href="/admin/floors">
                        <span>🏢 Manage Floors</span>
                    </Link>
                </SidebarMenuButton>
            </SidebarMenuItem>

            <!-- Manage Rooms -->
            <SidebarMenuItem>
                <SidebarMenuButton as-child :is-active="page.url.startsWith('/admin/rooms')">
                    <Link href="/admin/rooms">
                        <span>🚪 Manage Rooms</span>
                    </Link>
                </SidebarMenuButton>
            </SidebarMenuItem>

            <!-- Statistics -->
            <SidebarMenuItem>
                <SidebarMenuButton as-child :is-active="page.url.startsWith('/admin/statistics')">
                    <Link href="/admin/statistics">
                        <span>📊 View Statistics</span>
                    </Link>
                </SidebarMenuButton>
            </SidebarMenuItem>
        </SidebarMenu>
    </SidebarGroup>
</template>
