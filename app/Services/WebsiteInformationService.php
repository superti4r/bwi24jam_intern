<?php

namespace App\Services;

use App\Models\WebsiteInformation;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class WebsiteInformationService
{
    public function update(WebsiteInformation $websiteInformation, array $data, ?UploadedFile $heroImage = null): WebsiteInformation
    {
        if ($heroImage) {
            if ($websiteInformation->hero_image && !str_starts_with($websiteInformation->hero_image, 'images/')) {
                Storage::disk('public')->delete($websiteInformation->hero_image);
            }

            $data['hero_image'] = $heroImage->store('website', 'public');
        }

        $websiteInformation->update($data);

        return $websiteInformation->refresh();
    }
}
