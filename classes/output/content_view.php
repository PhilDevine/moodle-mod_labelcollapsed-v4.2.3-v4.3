<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace mod_labelcollapsed\output;

use cm_info;
use renderable;
use renderer_base;
use stdClass;
use templatable;

class content_view implements renderable, templatable {
    private cm_info $cm;

    public function __construct(cm_info $cm) {
        $this->cm = $cm;
    }

    public function export_for_template(renderer_base $output): stdClass {
        global $DB;

        $data = $DB->get_record('labelcollapsed', ['id' => $this->cm->instance]);
        $data->intro = format_module_intro('labelcollapsed', $data, $this->cm->id);
        return $data;
    }
}
