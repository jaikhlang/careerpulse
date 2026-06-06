<script>
    let { sources } = $props();
</script>

<h1 class="text-2xl font-bold mb-4">Sources</h1>

<table class="w-full">
    <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        {#each sources.data as source (source.id)}
            <tr>
                <td>{source.name}</td>
                <td>{source.type}</td>
                <td>
                    {source.is_active ? 'Active' : 'Disabled'}
                </td>
            </tr>
        {/each}
    </tbody>
</table>
