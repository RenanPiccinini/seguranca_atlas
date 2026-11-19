<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update services table
        $services = DB::table('services')->get();
        foreach ($services as $service) {
            $updated = false;
            $shortDesc = $service->short_description;
            $fullDesc = $service->full_description;
            $features = json_decode($service->features, true) ?? [];

            // Replace armamento / armada in short description
            if (stripos($shortDesc, 'armamento') !== false || stripos($shortDesc, 'armada') !== false) {
                $shortDesc = str_ireplace(
                    ['armamento/equipamento regulamentado e postura tática exemplar.', 'armamento/equipamento', 'armamento', 'armada'],
                    ['equipamentos táticos de radiocomunicação e postura exemplar.', 'equipamentos táticos', 'equipamentos táticos', 'desarmada'],
                    $shortDesc
                );
                $updated = true;
            }

            // Replace in features
            foreach ($features as $idx => $feat) {
                if (stripos($feat, 'armada') !== false || stripos($feat, 'armamento') !== false) {
                    $features[$idx] = str_ireplace(
                        ['Vigilância armada e desarmada conforme diretrizes federais', 'armada e desarmada', 'armada', 'armamento'],
                        ['Vigilância patrimonial e preventiva especializada', 'preventiva e desarmada', 'preventiva', 'equipamentos táticos'],
                        $feat
                    );
                    $updated = true;
                }
            }

            if ($updated) {
                DB::table('services')->where('id', $service->id)->update([
                    'short_description' => $shortDesc,
                    'full_description' => $fullDesc,
                    'features' => json_encode($features, JSON_UNESCAPED_UNICODE),
                    'updated_at' => now(),
                ]);
            }
        }

        // Also clean up differentials table if any
        $differentials = DB::table('differentials')->get();
        foreach ($differentials as $diff) {
            if (stripos($diff->description, 'armamento') !== false || stripos($diff->description, 'armad') !== false) {
                $desc = str_ireplace(
                    ['sem armamento de fogo', 'postura não-armada de alto nível', 'armamento', 'armada'],
                    ['supervisão tática preventiva contínua', 'postura preventiva de alto nível', 'equipamentos táticos', 'preventiva'],
                    $diff->description
                );
                DB::table('differentials')->where('id', $diff->id)->update([
                    'description' => $desc,
                    'updated_at' => now(),
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No reversal needed
    }
};
