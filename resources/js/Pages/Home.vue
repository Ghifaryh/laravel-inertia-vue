<script setup>
import PaginationLinks from "./Components/PaginationLinks.vue";

defineProps({
  users: Object,
});

// format date
const getDate = (date) =>
  new Date(date).toLocaleDateString("en-US", {
    year: "numeric",
    month: "long",
    day: "numeric",
  });
</script>

<template>
  <Head :title="` ${$page.component}`" />
  <h1>Home Page</h1>
  <div>
    <table>
      <thead>
        <tr class="bg-slate-300">
          <th>Avatar</th>
          <th>Name</th>
          <th>Email</th>
          <th>Registration Date</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users.data" :key="user.id">
          <td>
            <img
              :src="user.avatar
                  ? 'storage/' + user.avatar
                  : 'storage/avatars/111008739_p0.png'
                "
              class="avatar"
            />
          </td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>{{ getDate(user.created_at) }}</td>
        </tr>
      </tbody>
    </table>

    <!-- Pagination Links -->
    <div>
      <!-- <Link
        v-for="link in users.links"
        key="link.label"
        v-html="link.label"
        :href="link.url"
        class="p-1 mx-1"
        :class="{ 'text-slate-300': !link.url, 'text-blue-500 font-medium': link.active }"
      ></Link>

      <p class="text-skate-600 text-sm">
        Showing {{ users.from }} to {{ users.to }} of {{ users.total }} results
      </p> -->
      <PaginationLinks :paginator="users" />
    </div>
  </div>
</template>
