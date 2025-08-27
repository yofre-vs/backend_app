import { RenderEnrollmentTable } from './driver-courses-enrollments-render.js';
import { FloatingAttendance } from './driver-courses-enrollments-floting-attendance.js';
import { FloatingStatus } from './driver-courses-enrollments-floting-status.js';

import { ApiClient } from '../global/js/utils/apiClient.js';

document.addEventListener('DOMContentLoaded', () => {
  const container = document.getElementById('enrollment-container');
  const enrollments = window.dataEnrollments || [];
  RenderEnrollmentTable.render(container, enrollments);
  FloatingAttendance.init();
  FloatingStatus.init();
});
