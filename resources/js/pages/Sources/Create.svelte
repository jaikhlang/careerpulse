<script lang="ts">
    import { useForm } from '@inertiajs/svelte';

    const form = useForm({
        name: '',
        slug: '',
        base_url: '',
        type: 'government',
        crawl_interval: 60,
        is_active: true,
    });

    const submit = () => {
        form.post(route('sources.store'));
    };
</script>

<form on:submit|preventDefault={submit}>
    <input bind:value={form.name} />
    <input bind:value={form.slug} />
    <input bind:value={form.base_url} />

    <button type="submit">Save</button>
</form>
