<script setup>
defineProps({
  user: String,
});
</script>

<template>
  <Head>
    <title>About</title>
    <meta head-key="description" name="description" content="This is About description" />
  </Head>
  <div>
    <h1>About {{ user }}</h1>
  </div>
</template>
