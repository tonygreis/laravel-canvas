<div class="m-4 p-4">
  <section class="w-full flex">
      <button class="bg-green-500 p-2 m-2 rounded-lg" wire:click="runSitemapGenerator">Sitemap Generate</button>

      <div class="m-2 p-2 bg-yellow-300" wire:loading wire:target="runSitemapGenerator">
          <span class="text-yellow-400">Processing sitemap...</span>
      </div>
  </section>
    <section class="w-full mt-2 flex">
        <button class="bg-green-500 p-2 m-2 rounded-lg" wire:click="runBackup">Run Backup</button>

        <div class="m-2 p-2 bg-yellow-300" wire:loading wire:target="runBackup">
            <span class="text-yellow-400">Processing Backup...</span>
        </div>
    </section>
    <section class="w-full mt-2 flex">
        <button class="bg-green-500 p-2 m-2 rounded-lg" wire:click="runBackupDb">Run Backup DB Only</button>

        <div class="m-2 p-2 bg-yellow-300" wire:loading wire:target="runBackupDb">
            <span class="text-yellow-400">Processing Backup db only...</span>
        </div>
    </section>
</div>
