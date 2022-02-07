import axios from 'axios';
import {getAuthorizationToken} from '../services/AuthService';

export const request = axios.create({
  baseURL: '/api/v1/',
  headers: {
    Accept: 'application/json',
    Authorization: `Bearer ${getAuthorizationToken()}`,
  }
});

export const handleServerError = (error) => {
  if (!axios.isAxiosError(error)) {
    console.dir(error);
    return null;
  }

  const response = error.response;
  const {message, errors} = response.data;

  return {
    errors: Object.fromEntries(
      Object.keys(errors ?? {}).map(name => [name, errors[name].pop()])),
    message,
  };
};

/**
 *
 * @param token {string}
 */
export const setAuthToken = (token) => {
  request.defaults.headers.Authorization = `Bearer ${token}`;
};
