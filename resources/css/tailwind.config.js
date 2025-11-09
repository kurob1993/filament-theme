import path from 'node:path'
import { fileURLToPath } from 'node:url'

import preset from '../../../../../vendor/filament/filament/tailwind.config.preset'

const projectRoot = path.resolve(fileURLToPath(new URL('../../../../../', import.meta.url)))

export default {
    presets: [preset],
    content: [
        path.join(projectRoot, 'app/Filament/**/*.php'),
        path.join(projectRoot, 'resources/**/*.blade.php'),
        path.join(projectRoot, 'vendor/filament/**/*.blade.php'),
    ],
}
