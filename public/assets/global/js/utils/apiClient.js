export class ApiClient {
    constructor(baseUrl = '') {
      this.baseUrl = baseUrl;
      this.csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    }
  
    async request(path, { method = 'GET', data = null, json = false } = {}) {
      const headers = {
        'X-CSRF-TOKEN': this.csrf
      };
  
      let body = data;
  
      if (json) {
        headers['Content-Type'] = 'application/json';
        body = JSON.stringify(data);
      }
  
      try {
        const res = await fetch(this.baseUrl + path, {
          method,
          headers,
          body
        });
  
        const isJson = res.headers.get('content-type')?.includes('application/json');
        const responseData = isJson ? await res.json() : await res.text();
  
        if (!res.ok) throw { status: res.status, data: responseData };
  
        return responseData;
      } catch (error) {
        console.error(`❌ AJAX error in ${method} ${path}`, error);
        throw error;
      }
    }
  
    get(path) {
      return this.request(path, { method: 'GET' });
    }
  
    post(path, data, json = false) {
      return this.request(path, { method: 'POST', data, json });
    }
  
    put(path, data, json = false) {
      return this.request(path, { method: 'PUT', data, json });
    }
  
    delete(path) {
      return this.request(path, { method: 'DELETE' });
    }
  }
  