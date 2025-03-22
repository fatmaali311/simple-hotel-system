import { type NavItem } from '@/types';
import { LayoutGrid, Users, ClipboardList, Building2, Hotel, BarChart } from 'lucide-vue-next';

export function getNavItemsByRole(user: any): NavItem[] {
  const roles = user?.roles?.map((r: any) => r.name) || [];
  const isAdmin = roles.includes('admin');
  const isManager = roles.includes('manager');
  const isReceptionist = roles.includes('receptionist');

  const items: NavItem[] = [
    { title: 'Dashboard', href: '/admin/dashboard', icon: LayoutGrid },
  ];

  if (isAdmin) {
    items.push({ title: 'Manage Managers', href: '/admin/managers', icon: Users });
  }

  if (isAdmin || isManager) {
    items.push({ title: 'Manage Receptionists', href: '/admin/receptionists', icon: Users });
    items.push({ title: 'Manage Clients', href: '/admin/clients', icon: ClipboardList });
    items.push({ title: 'Manage Floors', href: '/admin/floors', icon: Building2 });
    items.push({ title: 'Manage Rooms', href: '/admin/rooms', icon: Hotel });
  }

  if (isAdmin) {
    items.push({ title: 'Statistics', href: '/admin/statistics', icon: BarChart });
  }

  return items;
}
